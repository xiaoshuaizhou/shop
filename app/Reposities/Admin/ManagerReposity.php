<?php

namespace App\Reposities\Admin;


use App\Admin;

class ManagerReposity
{
    public $admin;

    /**
     * Manager constructor.
     * @param $admin
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllManagers()
    {
        $res = $this->admin->latest()->paginate(5);

        return $res;
    }

    /**
     * @param $id
     * @return bool|null
     * @throws \Exception
     */
    public function destroy($id)
    {
        return $this->admin->where('id', $id)->delete();
    }

    /**
     * @param $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function create($data)
    {
        $data['password'] = bcrypt($data['password']);

        return $this->admin->create($data);
    }

    /**
     * @param $data
     * @return bool
     */
    public function changeEmail($data)
    {
        $admin = $this->admin->where('name', $data['name'])->firstOrFail();

        if (\Hash::check($data['password'], $admin->password)){
            $res = $this->admin->where('name', $data['name'])->firstOrFail();
            if (empty($res)){
                return false;
            }
            return !! $res->update(['email' => $data['email']]);

        }else{

            return false;
        }

    }

    /**
     * @param $data
     * @return bool
     */
    public function changePass($data)
    {
        $admin = $this->admin->where('name', $data['name'])->firstOrFail();
        if (empty($admin)){
            return false;
        }else{
            return !! $admin->update([
                'password' => bcrypt($data['password'])
            ]);
        }


    }
}