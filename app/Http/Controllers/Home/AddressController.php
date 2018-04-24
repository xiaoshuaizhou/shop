<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Home\Address;
use Illuminate\Http\Request;

class AddressController extends CommonController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(AddressRequest $request)
    {
        $data = $request->all();
        $data['userid'] = \Auth::guard('web')->id();
        Address::create($data);

       return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $address = Address::where('addressid', $id)->first();
        $res = $this->getMenu();
        $data = $this->totalPrice(\Auth::guard('web')->id());
        return view('home.address.Edit', compact('address', 'res', 'data'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        Address::where('addressid', $request->get('addressid'))->update($data);

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function del($id)
    {

        $address = Address::where('addressid', $id)->first();

        if ($address->userid != \Auth::guard('web')->id()){
            return redirect()->withErrors('删除失败，不能删除其他地址信息');
        }

        $address->where('addressid', $id)->delete();

        return redirect()->back();
    }
}
