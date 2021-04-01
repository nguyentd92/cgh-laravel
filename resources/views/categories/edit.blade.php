@extends('layouts.admin-layout')

@section('main-content')
<form method="POST">
    <input hidden name="_method" value="PUT"/>
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category's name</label>
    <input type="text" name="name" value="{{ $entity->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <input type="text" name="description" value="{{ $entity->description }}" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="/categories" class="btn btn-secondary">Back to list</a>
</form>
@endsection
