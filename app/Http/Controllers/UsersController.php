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
        return 'ok';
    }
}
