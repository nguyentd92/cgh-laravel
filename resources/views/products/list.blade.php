@extends('layouts.admin-layout')

@section('main-content')
    @csrf
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

    <div id="product_list"></div>

    <script>
        window.onload = loadList

        function loadList() {
            event.preventDefault();
            var url = `/products/list`;

            const xhr = new XMLHttpRequest();

            xhr.open('GET', url, false);

            xhr.onload = function(xml) {
                console.log(xml)
                const productListElement = document.querySelector('#product_list');

                productListElement.innerHTML = xml.target.response;
            }

            xhr.send(null);
        }

        function deleteProduct(id) {
            event.preventDefault();
            var url = `/products/${id}/delete`;
            var csrfToken = document.querySelector('[name="_token"]').value;

            const xhr = new XMLHttpRequest();

            xhr.open('DELETE', url, false);
            xhr.setRequestHeader('x-csrf-token', csrfToken);
            xhr.setRequestHeader("Content-Type", "application/json; charset=utf-8");
            xhr.setRequestHeader("Accept", "application/json");

            xhr.onload = function() {
                loadList()
            }

            xhr.send(null);
        }
    </script>
@endsection
