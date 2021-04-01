@extends('layouts.admin-layout')

@section('main-content')
<form method="POST">
    @csrf
    <input hidden name="_method" value="DELETE">
    <h1>Bạn có muốn xóa?</h1>

    <button type="submit" class="btn btn-danger">Xóa ngay</button>
    <button type="button" class="btn btn-danger">Bỏ qua</button>
</form>
@endsection
