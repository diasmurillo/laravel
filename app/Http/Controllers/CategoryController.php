<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //index Vai buscar todas as categorias da base de dados
    public function index() {
        $categories = Category::get();

        return response()->json([
            "categories" => $categories
        ]);
    }


    //store
    public function store(Request $request) {
        $category = new Category();

        $category->title = $request->title;

        $category->save();

        return response()->json([
            "message" => "Bem sucedido",
            "category" => $category
        ]);
    }
}
