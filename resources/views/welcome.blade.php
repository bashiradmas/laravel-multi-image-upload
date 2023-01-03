@extends('layout')
@section('content')
   <div class="row justify-content-between">
        <div class="col-md-5">
            <h3>Add Product</h3>
            <form action="" method="POST" enctype="multipart/form-data">
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
                    <label for="title">Product Category:</label>
                    <select name="category"  class="form-control @error('category') is-invalid @enderror">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="files">Upload Images:</label>
                    <input type="file" name="images[]" multiple class="form-control @error('images') is-invalid @enderror">
                    <span class="text-danger">
                        @error('images')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group mt-3">
                   <button class="btn btn-primary float-end">Add Product</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h3>Products</h3>
        </div>
   </div>
@endsection