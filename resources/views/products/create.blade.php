@extends('layouts.admin-layout')

@section('main-content')
<form method="POST">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product's name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Unit price</label>
    <input type="number" name="unit_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">In stock</label>
    <input type="number" name="in_stocks" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Belong to category</label>

    <select class="form-control" name="category_id" id="">
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea type="text" name="description" class="form-control" id="exampleInputPassword1"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="/categories" class="btn btn-secondary">Back to list</a>
</form>
@endsection
