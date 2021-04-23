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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>

<!-- Large modal -->
<div id="edit-product-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        Waiting for loading edit form
    </div>
  </div>
</div>



<script>
    window.onload = loadList

    // function loadList() {
    //     event.preventDefault();
    //     var url = `/products/list`;

    //     const xhr = new XMLHttpRequest();

    //     xhr.open('GET', url, false);

    //     xhr.onload = function(xml) {
    //         console.log(xml)
    //         const productListElement = document.querySelector('#product_list');

    //         productListElement.innerHTML = xml.target.response;
    //     }

    //     xhr.send(null);
    // }

    function openEditForm(idProduct) {
        $("#edit-product-modal").modal();

        $.ajax({
            url: `/products/${idProduct}/edit-form`,
            success: function(xml) {
                document.querySelector('#edit-product-modal .modal-content').innerHTML = xml;
            }
        })
    }

    function submitEdit(idProduct) {
        const data = {
            _token: document.querySelector(`#edit-production-form [name="_token"]`).value,
            name: document.querySelector(`#edit-production-form [name="name"]`).value,
            unit_price: document.querySelector(`#edit-production-form [name="unit_price"]`).value,
            in_stocks: document.querySelector(`#edit-production-form [name="in_stocks"]`).value,
            category_id: document.querySelector(`#edit-production-form [name="category_id"]`).value,
        }

        $.ajax({
            url: `/products/${idProduct}/edit`,
            type: 'PUT',
            data: data,
            success: function() {
                // Alert success
                alert("Edit successfully")

                // Close Modal
                $("#edit-product-modal").modal("hide");

                // Reload List
                loadList();
            },
            error: function() {
                alert("Edit Failed")
            }
        })
    }

    function loadList() {
        var url = `/products/list`;

        $.ajax({
            url: url,
            success: function(xml) {
                console.log(xml)
                const productListElement = document.querySelector('#product_list');

                productListElement.innerHTML = xml;
            },
            error: function(error) {
                console.log("Xảy ra lỗi: " + error.message)
            }
        })
    }

    function deleteProduct(id) {
        event.preventDefault();
        var url = `/products/${id}/delete`;
        var csrfToken = document.querySelector('[name="_token"]').value;
        var csrfToken = document.querySelector('[name="_token"]').value;
        var csrfToken = document.querySelector('[name="_token"]').value;
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

<style>
    .modal-content {
        padding: 1rem
    }
</style>
@endsection
