@extends('layouts.auth-admin-layout')

@section('form')
<form method="POST">
    @csrf
    <div class="form-group">
            <label for="inputAddress">Name</label>
            <input name="full_name" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>

        <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Password">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Sign in</button>
</form>
@endsection('form')
