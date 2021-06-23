@extends('layouts.dashboard')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">All Products</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{route('product.create')}}" class="btn btn-outline-secondary">Add New Product</a>
                </div>
            </div>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th width="280px">Actions</th>
                </tr>
                </tbody>

                @foreach($products as $product )
                    <tr>
                        <td>   {{$product->id}}</td>
                        <td>   {{$product->name}}</td>
                        <td>   {{$product->price}}</td>
                        <td>   {{$product->quantity}}</td>
                        <td>
                            <a class="btn btn-info" href="{{route('product.edit',[$product->id])}}">تعديل</a>
                            <form action="{{route('product.destroy',[$product->id])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
                <tr></tr>
            </table>
        </div>
    </main>
@endsection
