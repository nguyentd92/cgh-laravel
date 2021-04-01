@extends('layouts.admin-layout')

@section('main-content')
    <div class="d-flex align-items-start">
        <div class="col-6">
            <a class="btn btn-primary" href="/products/create">Create Product</a>
        </div>

        <form class="input-group" method="POST" action="/products">
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
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entities as $index => $entity)
            <tr>
                <th scope='row'>{{ $index + 1 }}</th>
                <td>{{ $entity->name }}</td>
                <td>{{ $entity->description }}</td>
                <td><a class='btn btn-warning' href='/products/{{ $entity->id }}/edit'>Sửa</a></td>
                <td><a class='btn btn-warning' href='/products/{{ $entity->id }}/delete'>Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
