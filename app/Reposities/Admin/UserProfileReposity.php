<?php

namespace App\Reposities\Admin;


use App\Models\Admin\Profile;
use App\User;
use Exception;
use Illuminate\Support\Facades\DB;

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
     * @return bool
     */
    public function create($data)
    {
        $data['password'] = bcrypt($data['name']);
        $data['token'] = str_random(60);
        DB::beginTransaction();
        try {
            $user = $this->userModel->create($data);
            $data['userid'] = $user->id;
            $profile = $this->userModel->pofile()->create($data);
            DB::commit();
            return true;
        }catch (Exception $exception){
            if (!$user || !$profile){
                DB::rollBack();
                return false;
            }
        }

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
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function getUserById($id)
    {
        return $this->userModel->has('pofile')->with('pofile')->find($id);
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

    /**
     * @param $data
     * @return bool
     * @throws \Throwable
     */
    public function changeProfileByPass($data)
    {
        $user = $this->userModel::findOrFail($data['id']);
        if (\Hash::check($data['password'], $user->password)){
            DB::beginTransaction();
            try {
                $user->email = $data['email'];
                $user->name = $data['name'];
                $res = $user->saveOrFail();
                $array['sex'] = $data['sex'];
                $array['nickname'] = $data['nickname'];
                $array['truename'] = $data['truename'];
                $array['company'] = $data['company'];
                $info = $user->pofile()->update($array);
                if ($res && $info){
                    DB::commit();
                    return true;
                }
            }catch (Exception $exception){
                    DB::rollBack();
                    return false;
            }

        }else{
            flash('修改失败', 'warning');
            return false;
        }
    }
}