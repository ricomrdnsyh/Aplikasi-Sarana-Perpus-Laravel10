<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request) {

        $data = new User;

        if($request->get('search')){
            $data = $data->where('username', 'LIKE', '%'.$request->get('search').'%');
        }

        $data = $data->get();

        return view('users.index', compact('data', 'request'));
    }

    public function addUser(){
        return view('users.addUser');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'username' => 'required|unique:users,username',
            'password' => 'required|min:3',

        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['username'] = $request->username;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('admin.user')->with('success', 'Data Berhasil ditambahkan!');
    }

    public function editUser(Request $request,$id){
        $data = User::find($id);

        return view('users.editUser', compact('data'));
    }

    public function updateuser(Request $request,$id){

        $validator = Validator::make($request->all(),[
            'username'  => 'required',
            'password'  => 'nullable|min:3',

        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['username']       = $request->username;

        if($request->password){
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);

        return redirect()->route('admin.user')->with('success', 'Data berhasil diubah! ');
    }

    public function deleteUser(Request $request,$id){
        $data = User::findOrFail($id);

        $data->delete();

        return redirect()->route('admin.user')->with('success', 'Data berhasil dihapus! ');
    }
}
