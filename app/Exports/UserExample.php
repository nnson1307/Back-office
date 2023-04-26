<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 10/3/2019
 * Time: 12:06 PM
 */

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExample implements FromCollection, WithHeadings
{
    public function collection()
    {
        return collect([]);
    }

    public function headings(): array
    {
        $export = [
            'STT',
            'Số điện thoại'
        ];
        return $export;
    }
}