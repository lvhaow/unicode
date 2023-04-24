<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    public function index() {
        $title = 'Danh Sach Nguoi dung';
        $users = DB::select('select * from users');
        return view('clients.users.lists', compact('title', 'users'));
    }
}
