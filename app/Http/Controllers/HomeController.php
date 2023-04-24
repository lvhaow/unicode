<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;
use App\Rules\Uppercase;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public $data = [];
    public function index() {
        $this->data['title'] = 'Dao tao lap trinh vien';
        $this->data['message'] = 'Dang Ky Tai Khoan Thanh Cong';
        // $users = DB::select('select * from users WHERE email =:email',[
        //     'email' => 'vananh@gmail.com'
        // ]);
        // dd($users);
        return view('clients.home', $this->data);
    }

    public function products() {
        $this->data['title'] = 'san pham';
        return view('clients.products', $this->data);

    }

    public function getAdd() {
        $this->data['title'] = 'Them San Pham';
        $this->data['errorMessage'] = 'Vui long kiem tra du lieu nhap vao';
        return view('clients.add', $this->data);
    }

    public function postAdd(ProductRequest $request) {
        dd($request);
        // $rule = [
        //     'product_name' => 'required|min:6',
        //     'product_price' => 'required|integer'
        // ];
        // $message = [
        //     'product_name.required' => 'ten san pham bat buoc phai nhap',
        //     'product_name.min' => 'ten san pham khong duoc nho hon :min ky tu',
        //     'product_price.required' => 'Gia san pham bat buoc phai nhap',
        //     'product_price.integer' => 'Gia san pham phai la so',
        // ];
        // $message = [
        //     'required' => 'Truong :attribute bat buoc phai nhap',
        //     'min' => 'Truong :atribute khong duoc nho hon :min ky tuc ',
        //     'integer' => 'Truong :attribute phai la so'
        // ];
        // $request->validate($rule, $message);
    }

    public function putAdd(Request $request) {
        return 'phuong thuc put';
        dd($request);
    }

    public function getArr() {
        $contentArr = [
        'name' => 'Laravel 10x',
        'Lession' => 'Khoa Hoc Lap Trinh',
        'academy' => 'unicode academy'
    ];
    return $contentArr;
    }

}
