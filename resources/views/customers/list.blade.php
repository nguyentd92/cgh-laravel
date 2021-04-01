@extends('layouts.admin-layout')

@section('main-content')
<div class="d-flex align-items-start">
    <div class="col-6">
        <a class="btn btn-primary" href="/customers/create">Create Customer</a>
    </div>

    <form class="input-group" method="POST" action="/customers?keyword=vegi">
        @csrf
        <input type="text" class="form-control" placeholder="Keyword" aria-label="Search Keyword" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-warning" type="submit">Search</button>
        </div>
    </form>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $index => $customer)
        <tr>
            <th scope='row'>{{ $index + 1 }}</th>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer["address"]}}</td>
            <td><a class='btn btn-warning' href='/customers/{{ $customer->id }}/edit'>Sửa</a></td>
            <td><a class='btn btn-warning' href='/customers/{{ $customer->id }}/delete'>Xóa</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
