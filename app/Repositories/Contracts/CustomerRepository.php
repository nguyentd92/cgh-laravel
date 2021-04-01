<?php

namespace App\Repositories\Contracts;

interface CustomerRepository {
    public function getList();
    public function getById($id);
    public function create($entity);
    public function update($id, $entity);
    public function delete($id);
}
