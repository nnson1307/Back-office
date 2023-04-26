<?php


namespace Modules\User\Repositories\StoreUser;

interface StoreUserRepositoryInterface
{
    /**
     * Lấy danh sách tài khoản Store user
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters = []);

    /**
     * Tạo tài khoản Store user
     * @param array $data
     * @return mixed
     */
    public function add(array $data);

    /**
     * Lấy thông tin tài khoản Store user theo id
     * @param $id
     * @return mixed
     */
    public function getItem($id);

    /**
     * Cập nhật tài khoản Store user
     * @param array $data
     * @return mixed
     */
    public function edit(array $data);

    /**
     * Xóa tài khoản Store user
     * @param $id
     * @return mixed
     */
    public function remove($id);

    /**
     * Kiểm tra user đã tồn tại hay chưa
     * @param $phone
     * @return mixed
     */
    public function isUserExist($phone);

    /**
     * Cập nhật trạng thái của store user
     * @param $user_id
     * @param $is_activated
     * @return mixed
     */
    public function updateStatus($user_id, $is_activated);

    /**
     * Reset mật khẩu tài khoản store user
     * @param array $data
     * @return mixed
     */
    public function resetPasswordStoreUser(array $data);

    public function getStoreReferenceUser($phone);
}
