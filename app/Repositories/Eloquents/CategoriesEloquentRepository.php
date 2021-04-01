<?php
namespace App\Repositories\Eloquents;

use App\Models\Category;
use App\Repositories\Contracts\CategoriesRepository;
use Exception;

class CategoriesEloquentRepository implements CategoriesRepository {
    public function getList() {
        return Category::all();
    }

    public function getById($id) {
        return Category::find($id);
    }

    public function create($attributes) {
        return Category::create($attributes);
    }

    public function update($id, $attributes) {
        $entity = $this->getById($id);

        if(!$entity) {
            throw new Exception('Entity is not exist');
        }

        $entity->name = $attributes['name'];
        $entity->description = $attributes['description'];

        return $entity->save();
    }

    public function delete($id) {
        $entity = $this->getById($id);

        if(!$entity) {
            throw new Exception('Entity is not exist');
        }

        $entity->destroy($id);
    }
}
