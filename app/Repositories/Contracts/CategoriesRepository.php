<?php

namespace App\Repositories\Contracts;

interface CategoriesRepository {
    public function getList();
    public function getById($id);
    public function create($attributes);
    public function update($id, $attributes);
    public function delete($id);
}
