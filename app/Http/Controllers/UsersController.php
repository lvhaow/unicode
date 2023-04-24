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

        $statement = $this->users->statementUser("SELECT * FROM users");

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

    public function getEdit(Request $request, $id=0){
        $title = 'Cap nhat nguoi dung';

        if (!empty($id)){
            $userDetail =  $this->users->getDetail($id);
            if (!empty($userDetail[0])){
                $request->session()->put('id', $id);
                $userDetail = $userDetail[0];
            } else{
                return redirect()->route('users.index')->with('msg', 'Nguoi dung khong ton tai');
            }
        }else{
            return redirect()->route('users.index')->with('msg', 'Lien ket khong ton tai');
        }
        return view('clients.users.edit', compact('title', 'userDetail'));
    }

    public function postEdit(Request $request){
        $id = session('id');
        if (empty($id)) {
            return back()->with('msg', 'Lien ke ko ton tai');
        }
        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users,email,'.$id
        ],[
            'fullname.required' => 'Ho va ten bat buoc phai nhap',
            'fullname.min' => 'Ho va te phai tu :min ky tu tro len',
            'email.required' => 'Email bat buoc phai nhap',
            'email.email' => 'Email khong dung dinh dang',
            'email.unique' => 'Email da ton tai trong he thong'
        ]);

        $dataUpdate = [
            $request->fullname,
            $request->email,
            date('y-m-d H:i:s')
        ];
        $this->users->updateUser($dataUpdate, $id);

        // return redirect()->route('users.edit', ['id'=>$id])->with('cap nhat nguoi dung thanh cong');
        return back()->with('msg', 'Cap Nhat nguoi dung thanh cong');
    }

    public function delete($id=0){
        if (!empty($id)){
            $userDetail =  $this->users->getDetail($id);
            if (!empty($userDetail[0])){
               $deleteStatus = $this->users->deleteUser($id);
               if ($deleteStatus){
                    $msg = 'xoa nguoi dung thanh cong';
               }else {
                $msg = 'ban ko the xoa nguoi dung';
               }
            } else{
                $msg = 'Nguoi dung ko ton tai';
            }
        }else{
           $msg = 'Lien ke ko ton tai';
        }
        return redirect()->route('users.index')->with('msg', $msg);
    }
}
