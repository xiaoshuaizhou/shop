<?php

namespace App\Reposities\Admin;


use App\Models\Admin\Profile;
use App\User;
use Exception;

/**
 * Class UserProfileReposity
 * @package App\Reposities\Admin
 */
class UserProfileReposity
{
    /**
     * @var User
     */
    public $userModel;

    /**
     * UserProfileReposity constructor.
     * @param $userModel
     */
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * @param $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function create($data)
    {
        $data['password'] = bcrypt($data['name']);
        $user = $this->userModel->create($data);
        $data['userid'] = $user->id;

        return $this->userModel->pofile()->create($data);
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllUsers()
    {
        return $this->userModel->has('pofile')->with('pofile')->paginate(1);
    }

    /**
     * @param $id
     * @return bool|mixed|null
     * @throws Exception
     */
    public function delete($id)
    {
        Profile::where('userid', $id)->delete();
        return $this->userModel->where('id', $id)->delete();
    }
}