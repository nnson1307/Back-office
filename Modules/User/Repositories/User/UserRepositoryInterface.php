<?php
namespace Modules\User\Repositories\User;


/**
 * User Repository interface
 *  
 * @author isc-daidp
 * @since Feb 23, 2018
 */
interface UserRepositoryInterface
{    
    /**
     * Get User list
     * 
     * @param array $filters
     */
    public function getList(array $filters = []);
    
    
    /**
     * Delete user
     * 
     * @param number $id
     */
    public function remove($id);
    
    
    /**
     * Add user
     * 
     * @param array $data
     * @return number
     */
    public function add(array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id);

    /**
     * @param $token
     * @return mixed
     */
    public function getUserToken($token);

    public function resetPassword(array $data=[]);

    public function twoFactorAuth(array $data=[]);

    public function getItemUser($id);

    public function searchUser($name, $phone, $code);
}
