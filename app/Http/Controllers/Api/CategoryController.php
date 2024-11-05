<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index(){
//        return Category::all();
        return CategoryResource::collection(Category::all());
    }

    public function show(Category $category){
        return new CategoryResource($category);
    }

    public function store(StoreCategoryRequest $request){

        $data = $request->all();

        if($request->hasFile('photo')){
            $file = $request->file('photo'); //obtener el $file (todos los datos que tiene la imagen)  ($_files)
            $name = 'categories/'.Str::uuid().'.'.$file->extension(); //crear un nombre único para la imagen
            $file->storeAs('categories',$name,'public'); // guardar la imagen
            $data['photo'] = $name; //asignar el nombre de la imagen al array $data; el $name es la ruta donde se guarda la imagen
        }

        $category = Category::create($request->all());

        return new CategoryResource($category);
    }

    public function update(Category $category, StoreCategoryRequest $request){
        $category->update($request->all());

        return new CategoryResource($category);
    }

    public function destroy(Category $category){
        $category->delete();

        return response(null,Response::HTTP_NO_CONTENT);
//        return response()->noContent();
    }

    public function list(){
        return CategoryResource::collection(Category::all());
    }



}
