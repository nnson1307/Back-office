<?php

namespace App\Console\Commands;

use App\Exceptions\CommandException;
use Carbon\Carbon;
use Modules\Job\Models\StationParameterTable;
use Modules\Job\Models\StationTable;
use Illuminate\Console\Command;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use \Elasticsearch;

/**
 * Created by PhpStorm.
 * User: phuoc
 * Date: 25/05/2019
 * Time: 3:10 PM
 */
class ReadDataCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vgis:read-data {station_code} {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read data from excel day';

    /**
     * @var \Elasticsearch\Client
     */
    protected $stationInfo;
    protected $stationParams;
    protected $paramValid;
    protected $lastUpTIme;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Load thông tin cấu hình trạm
     *
     * @throws CommandException
     */
    protected function loadConfig()
    {
        // Lấy thông tin trạm từ code
        $code = $this->argument('station_code');
        $mStation = new StationTable();
        $this->stationInfo = $mStation->getInfoByCode($code);

        if (!$this->stationInfo) {
            echo 'no station';
            exit;
        }

        // Lấy thông số trạm
        $mParams = new StationParameterTable();
        $this->stationParams = $mParams->getList($this->stationInfo->id);

        if (empty($this->stationParams)) {
            echo 'no config parameter';
            exit;
        }

        // khởi tạo valid data
        $this->paramValid = [];
        foreach ($this->stationParams as $param => $value) {
            $this->paramValid[$param] = 'required';
        }
    }

    /**
     * Khởi tạo đối tượng đọc excel
     *
     * @return \Box\Spout\Reader\ReaderInterface
     * @throws CommandException
     */
    protected function getDataReader()
    {
        try {
            $path = $this->argument('path');

            $reader = ReaderEntityFactory::createReaderFromFile($path);
            $reader->open($path);

            return $reader;
        } catch (\Exception $ex) {
            echo 'no read file';
            exit;
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        try {
            // Load config
            $this->loadConfig();

            // Đọc file
            $reader = $this->getDataReader();
        } catch (CommandException $ex) {
            $this->line($ex->getMessage());
            exit;
        }

        $data = [];
        foreach ($reader->getSheetIterator() as $sheet) {
            $header = [];
            $i = 0;

            foreach ($sheet->getRowIterator() as $row) {
                // do stuff with the row
                $cells = $row->getCells();

                // Đọc header
                if ($i == 0) {
                    $header = $this->getDataHeader($cells);
                    $i++;
                    continue;
                }

                // đọc dòng dữ liệu
                $rowData = $this->readDataBody($cells, $header);

                // Thêm thông số mặc định
                $this->initVariable($rowData);

                // Check sự cố
                $this->checkProblem($rowData);

                // Check QCVN
                $this->checkStandard($rowData);

                // Kiểm duyệt tự động
                $this->autoApprove($rowData);

                // Lưu db
                $this->insertES($rowData);
            }
        }

        $reader->close();
    }

    /**
     * Đọc header của file
     *
     * @param $row
     * @return array
     */
    protected function getDataHeader($row)
    {
        $header = [];

        foreach ($row as $cell) {
            $header[] = $cell->getValue() == 'Thời gian' ? '@timestamp' : $cell->getValue();
        }

        return $header;
    }

    /**
     * Xử lý dữ liệu file excel
     *
     * @param $row
     * @param $header
     * @return array
     */
    protected function readDataBody($row, $header)
    {
        $rowData = [];
        $count = 0;
        foreach ($row as $j => $cell) {
            $count++;
            $val = $cell->getValue();

            if ($val instanceof \DateTime) {
                $val = $val->format('Y-m-d\TH:i:s.000\Z');
            }
            if ($count > 2) {
                $val = (float)$val;
            }
            $rowData[$header[$j]] = $val;

        }
        return $rowData;
    }

    /**
     * Khởi tạo thông số mặc định
     *
     * @param $data
     */
    protected function initVariable(&$data)
    {
        $data['station_code'] = $this->argument('station_code');
        $data['source'] = $this->argument('path');
        $data['is_problem_network'] = 0;
        $data['is_problem_param'] = 0;
        $data['is_problem_data'] = 0;
        $data['is_qcvn_over'] = 0;
        $data['is_prepare_qcvn_over'] = 0;
        $data['station_status'] = "02";
        $data['is_delete'] = 0;
        $data['is_approve'] = 0;
    }

    /**
     * Check sự cố
     *
     * @param $data
     */
    protected function checkProblem(&$data)
    {
        $this->_checkProblemConnect($data);
        $this->_checkProblemParam($data);
        $this->_checkProblemData($data);
    }

    /**
     * Kiểm tra sự cố do kết nối
     *
     * @param $data
     */
    protected function _checkProblemConnect(&$data)
    {
        // kiểm tra tần suất up dữ liệu
//        $time = Carbon::createFromTimeString($data['@timestamp']);
        $time = Carbon::parse($data['@timestamp']);

        if (!empty($this->stationInfo['data_frequency'])
            && $this->lastUpTIme
            && $time->diffInMinutes($this->lastUpTIme) > $this->stationInfo['data_frequency']
        ) {
            // Xử lý lỗi kết nối dữ liệu
            $data['is_problem_network'] = 1;
        }

        $this->lastUpTIme = $time;
    }

    /**
     * Lỗi thiếu thông số dữ liệu
     * @param $data
     */
    protected function _checkProblemParam(&$data)
    {
        $isValid = \Validator::make($data, $this->paramValid);
        if (!$isValid->fails()) {
            $data['is_problem_param'] = 1;
        } else {
            echo 'is_problem_param';
            exit;
        }
    }

    /**
     * Lỗi sự cố do dữ liệu vượt ngưỡng đo của thiết bị
     *
     * @param $data
     */
    protected function _checkProblemData(&$data)
    {
        foreach ($data as $key => $val) {
            if (!isset($this->stationParams[$key])) {
                continue;
            }

            if ($val < $this->stationParams[$key]['device_min_limit'] || $val > $this->stationParams[$key]['device_max_limit']) {
                $data['is_problem_data'] = 1;
                break;
            }
        }
    }

    /**
     * Check quy chuẩn VN
     *
     * @param $data
     */
    protected function checkStandard(&$data)
    {

        foreach ($data as $key => $val) {

            if (!isset($this->stationParams[$key])) {
                continue;
            }
            if ($val < $this->stationParams[$key]['standard_min_limit']) {
                $data['is_qcvn_over'] = -1;
                break;
            } elseif ($val > $this->stationParams[$key]['standard_max_limit']) {
                $data['is_qcvn_over'] = 1;
                break;
            } elseif ($val >= $this->stationParams[$key]['standard_min_limit'] &&
                $val <= ($this->stationParams[$key]['standard_min_limit'] + $this->stationParams[$key]['standard_max_limit'] * 0.1)) {
                $data['is_prepare_qcvn_over'] = -1;

            } elseif ($val <= $this->stationParams[$key]['standard_max_limit'] &&
                $val >= ($this->stationParams[$key]['standard_max_limit'] - $this->stationParams[$key]['standard_max_limit'] * 0.1)) {
                $data['is_prepare_qcvn_over'] = 1;
            }
        }
    }

    /**
     * Kiểm duyệt dữ liệu tự động
     *
     * @param $data
     */
    protected function autoApprove(&$data)
    {

    }


    /**
     * Làm tạm để chạy thôi. Làm thực tế thì xài bulk insert. So sanh index giữa cái cũ với cái hiện tại.
     * Nếu thay đổi thì gọi lệnh bulk. Và khởi tạo lại param index với thông số mới
     *
     * @param $data
     */
    protected function insertES($data)
    {
        $date = substr($data['@timestamp'], 0, 10);
        $index = 'station_' . str_replace('-', '.', $date);
        $dataES = [
            'body' => $data,
            'index' => $index,
            'type' => 'vgis'//$data['station_code'],
        ];
        Elasticsearch::index($dataES);
    }
}
