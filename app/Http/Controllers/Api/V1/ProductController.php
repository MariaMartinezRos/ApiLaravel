<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        //end point-> punto de acceso desde fuera hasta nuestra aplicacion
        $products = Product::with('category')->paginate(9);
//        return $products;
        return ProductResource::collection($products);
    }
}
