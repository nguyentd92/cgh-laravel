<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CategoriesRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function getList(Request $request)
    {

        $entities = $this->categoriesRepository->getList();

        return view('categories.list', compact('entities'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $attributes = [
            'name' => $request->name,
            'description' => $request->description
        ];

        $this->categoriesRepository->create($attributes);

        return view('categories.create');
    }

    public function getById()
    {
    }

    public function edit($id)
    {
        $entity = $this->categoriesRepository->getById($id);

        return view('categories.edit', compact('entity'));
    }

    public function update($id, Request $request)
    {
        // Tìm customer từ DB
        $entity = $this->categoriesRepository->getById($id);

        // Gán các thuộc tính mới
        $attributes = [
            'name' => $request->name,
            'description' => $request->description
        ];

        // Lưu
        $this->categoriesRepository->update($id, $attributes);

        return redirect("/categories/$id/edit");
    }

    public function delete()
    {
        return view('categories.delete');
    }

    public function destroy($id)
    {
        $this->categoriesRepository->delete($id);

        return redirect('/categories');
    }
}
