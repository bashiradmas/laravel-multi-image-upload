@extends('layout')
@section('content')
   <div class="row justify-content-between">
        <div class="col-md-5">
            <h3>Add Product</h3>
            <form action="{{url('/add-product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                    <label for="title">Product Title:</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                    <span class="text-danger">
                        @error('name')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group mt-3">
                    <label for="title">Product Description:</label>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror">
                    <span class="text-danger">
                        @error('description')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group mt-3">
                    <label for="title">Product Price:</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror">
                    <span class="text-danger">
                        @error('price')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group mt-3">
                    <label for="title">Product Category:</label>
                    <select name="category"  class="form-control @error('category') is-invalid @enderror">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                     </select>
                </div>
                <div class="form-group mt-3">
                    <label for="files">Upload Images:</label>
                    <input type="file" name="images[]" multiple accept="image/*" class="form-control @error('images') is-invalid @enderror">
                    <span class="text-danger">
                        @error('images')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group mt-3">
                   <button class="btn btn-warning  float-end">Add Product</button>
                </div>
            </form>
        </div>
        <div class="col-md-7">
            <h3>Products List</h3>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>$ Price</th>
                        <th>Product Category</th>
                        <th>Published Date</th>
                        <th>#Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   {{-- {{$products->images->count()}} --}}
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>{{$product->images->count()}}</td>
                        <td>
                            <a href="{{url('/product-detail/'.$product->id)}}" class="btn btn-success">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pl-3">
                {{$products->links()}}
            </div>
        </div>
   </div>
@endsection