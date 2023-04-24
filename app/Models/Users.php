<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function getAllUsers() {
        $users = DB::select('select * from users ORDER BY created_at DESC');
        return $users;
    }

    public function addUser($data) {
        DB::insert('insert into users (fullname, email, created_at) values (?, ?, ?)', $data);
    }
}
