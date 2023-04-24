<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    private $users;
    public function __construct()
    {
        $this->users = new Users();
    }
    public function index() {
        $title = 'Danh Sach Nguoi dung';
        
      
        $usersList = $this->users->getAllUsers();
        return view('clients.users.lists', compact('title', 'usersList'));
    }

    public function add(){
        $title = 'Them nguoi dung';
        return view('clients.users.add', compact('title'));
    }

    public function postAdd(Request $request) {
        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ],[
            'fullname.required' => 'Ho va ten bat buoc phai nhap',
            'fullname.min' => 'Ho va te phai tu :min ky tu tro len',
            'email.required' => 'Email bat buoc phai nhap',
            'email.email' => 'Email khong dung dinh dang',
            'email.unique' => 'Email da ton tai trong he thong'
        ]);
        $dataInsert = [
            $request->fullname,
            $request->email,
            date('y-m-d H:i:s')
        ];
        $this->users->addUser($dataInsert);
        return redirect()->route('users.index')->with('msg', 'Them Nguoi Dung Thanh Cong');
    }
}
