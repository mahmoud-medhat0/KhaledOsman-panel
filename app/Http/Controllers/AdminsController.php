<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStore;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\adminupdate;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $admins = Admin::all();
        return view('admins.index',compact('admins'));
    }
    public function add()
    {
        return view('admins.add');
    }
    public function edit(Request $req)
    {
        $admin = Admin::find($req['id']);
        return view('admins.update',compact('admin'));
    }
    public function adminupdate(adminupdate $req)
    {
        $id = $req['id'];
        $update = Admin::find($id);
        $update->update(
            [
                'name' => $req['name'],
                'email' => $req['email']            ]
            );
            if(isset($req['password'])){
                $validate1 = array();
                $validate1['password'] = ['password' => ['required','string', 'min:8', 'confirmed']];
                $update->update(
                    [
                        'password' => Hash::make($req['password']),
                    ]
                    );
            }
            $admins = Admin::all();
            return view('admins.index',compact('admins'))->with('success', 'Admin Has Been updated Successful');
    }
    public function storeadmin(AdminStore $data)
    {
        Admin::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]
            );
            return redirect()->back()->with('success', 'Exercise Admin Has Been Added Successful');
    }
    public function admindelete($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->back()->with('success', 'Exercise Admin Has Been Deleted Successful');
    }
}
