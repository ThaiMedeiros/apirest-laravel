<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retornar a lista de todas as categorias cadastradas
        return response()->json(Category::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //cadastrar uma categoria
        $rules = [
            'name' => 'required|min:4',
            'description' => 'required|min:10|max:200',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //exibir apenas um registro de categoria
        $category = Category::find($id);

        if(is_null($category)){
            return response()->json(['message' => 'Record not found!'], 404);
        }

        return response()->json($category, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //atualizar um registro de categoria
        $category = Category::findOrFail($id);

        if(is_null($category)){
            return response()->json(['message' => 'Record not found!'], 404);
        }

        $rules = [
            'name' => 'required|min:4',
            'description' => 'required|min:10|max:200',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $category->update($request->all());
        return response()->json($category, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deletar um registro de categoria
        $category = Category::findOrFail($id);

        if(is_null($category)){
            return response()->json(['message' => 'Record not found!'], 404);
        }

        $category->delete();
        return response()->json(['message' => 'Category delete success!'], 201);
    }
}
