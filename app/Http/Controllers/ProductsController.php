<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getList(Request $request)
    {

        $entities = Product::where('name', 'LIKE' ,'%'.$request->keyword.'%')
            ->orWhere('description', 'LIKE' ,'%'.$request->keyword.'%')
            ->orWhere('unit_price', 'LIKE' ,'%'.$request->keyword.'%')
            ->orWhere('in_stocks', 'LIKE' ,'%'.$request->keyword.'%')
            ->get();

        return view('products.list', compact('entities'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $entity = new Product();

        $entity->name = $request->name;
        $entity->description = $request->description;
        $entity->in_stocks = $request->in_stocks;
        $entity->unit_price = $request->unit_price;
        $entity->category_id = $request->category_id;

        $entity->save();

        return redirect('/products/create');
    }

    public function getById()
    {
    }

    public function edit($id)
    {
        $entity = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('entity', 'categories'));
    }

    public function update($id, Request $request)
    {
        // Tìm customer từ DB
        $entity = Product::findOrFail($id);

        // Gán các thuộc tính mới
        $entity->name = $request->name;
        $entity->description = $request->description;
        $entity->in_stocks = $request->in_stocks;
        $entity->category_id = $request->category_id;

        // Lưu
        $entity->save();

        return redirect("/products/$id/edit");
    }

    public function delete()
    {
        return view('products.delete');
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('/products');
    }
}
