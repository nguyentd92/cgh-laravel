@extends('layouts.admin-layout')

@section('main-content')
<form method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product's name</label>
    <input type="text" value="{{ $entity->name }}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Unit price</label>
    <input type="number" value="{{ $entity->unit_price }}" name="unit_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">In stock</label>
    <input type="number" value="{{ $entity->in_stocks }}" name="in_stocks" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Belong to category</label>

    <select class="form-control" name="category_id" id="">
        @foreach($categories as $category)
        <option @if($category->id == $entity->category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea type="text" name="description" class="form-control" id="exampleInputPassword1"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="/products" class="btn btn-secondary">Back to list</a>
</form>
@endsection
