@extends('layouts.admin-layout')

@section('main-content')
<form method="POST">
    <input hidden name="_method" value="PUT"/>
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Customer's name</label>
    <input type="text" name="name" value="{{ $customer['name'] }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Phone</label>
    <input type="text" name="phone" value="{{ $customer['phone'] }}" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Address</label>
    <input type="text" name="address" value="{{ $customer['address'] }}" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
