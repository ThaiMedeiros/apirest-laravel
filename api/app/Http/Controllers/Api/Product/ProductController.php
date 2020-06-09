<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use Validator;

class ProductController extends Controller
{
    // Attributes
    private $request;

    /**
     * Injecting dependencies into the class constructor.
     */
    public function __construct(Request $request){
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::paginate();
        //return view('admin.pages.products.index', ['products' => $products]);

        return response()->json(Product::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $rules = [
            'name' => 'required|min:4',
            'description' => 'required|min:10|max:200',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'category_id' => 'required',
        ];

        $category = Category::find($this->request->category_id);

        if(is_null($category)){
            return response()->json([
                'message' => 'Informe uma categoria que esteja cadastrada no banco de dados.!'
            ], 404);
        }

        $validator = Validator::make($this->request->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $product = Product::create($this->request->all());
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if(is_null($product)){
            return response()->json(['message' => 'Record not found!'], 404);
        }

        return response()->json($product, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return view('admin.pages.products.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $product = Product::findOrFail($id);

        if(is_null($product)){
            return response()->json(['message' => 'Record not found!'], 404);
        }

        $category = Category::find($this->request->category_id);

        if(is_null($category)){
            return response()->json([
                'message' => 'Informe uma categoria que esteja cadastrada no banco de dados.!'
            ], 404);
        }

        $rules = [
            'name' => 'required|min:4',
            'description' => 'required|min:10|max:200',
        ];

        $validator = Validator::make($this->request->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $product->update($this->request->all());
        return response()->json($product, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if(is_null($product)){
            return response()->json(['message' => 'Record not found!'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Product delete success!'], 201);
    }
}
