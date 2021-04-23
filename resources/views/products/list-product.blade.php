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
        <tr id="product_item_{{ $entity->id }}">
            <th scope='row'>{{ $index + 1 }}</th>
            <td>{{ $entity->name }}</td>
            <td>{{ $entity->description }}</td>
            <td><a class='btn btn-warning' onclick="openEditForm({{ $entity->id }})">Sửa</a></td>
            @can(App\Permissions\ProductPermissions::$Delete)
            <td>
                <a class='btn btn-warning' onclick="deleteProduct({{ $entity->id }})">Xóa</a>
            </td>
            @endcan
        </tr>
        @endforeach
    </tbody>
</table>
