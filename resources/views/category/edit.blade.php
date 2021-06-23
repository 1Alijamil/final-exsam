@extends('layouts.dashboard')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Category</h1>
            <div class="btn-group mr-2">
                <a href="{{route('categories.index')}}" class="btn btn-outline-secondary">All Categories</a>
            </div>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">

            <div class="card-body">
                <form method="post" action="{{route('categories.update',$category->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name:</label>
                        <input type="text" class="form-control" name="category_name" value="{{$category->name}}"/>
                    </div>

                    <button type="submit" class="btn btn-primary">edit</button>
                </form>
            </div>
        </div>

    </main>
@endsection
