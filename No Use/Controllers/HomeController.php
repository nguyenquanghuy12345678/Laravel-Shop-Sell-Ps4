<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index() {

          // Giả sử có mảng dữ liệu sản phẩm từ database
          $products = [
            ['name' => 'Product 1', 'price' => '100,000', 'image' => 'product1.jpg'],
            ['name' => 'Product 2', 'price' => '200,000', 'image' => 'product2.jpg'],
            ['name' => 'Product 3', 'price' => '300,000', 'image' => 'product3.jpg']
        ];
        
        return view('pages.home');
    }
}
