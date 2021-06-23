@extends('layouts.dashboard')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">edit Product</h1>
            <div class="btn-group mr-2">
                <a href="{{route('product.index')}}" class="btn btn-outline-secondary">All Products</a>
            </div>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">

            <div class="card-body">
                <form method="POST" action="{{route('product.update',$product->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" class="form-control" name="product_name" value="{{$product->name}}"/>
                    </div>
                    <div class="form-group">
                        <label for="price">Product Category :</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Product Price :</label>
                        <input type="text" class="form-control" name="product_price"  value="{{$product->price}}"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Product Quantity:</label>
                        <input type="text" class="form-control" name="product_qty"  value="{{$product->Quantity}}"/>
                    </div>
                    <button type="submit" class="btn btn-primary">edit</button>
                </form>
            </div>
        </div>
    </main>
@endsection
