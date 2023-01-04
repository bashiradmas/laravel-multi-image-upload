@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2" >
            <h1>{{$product->name}}</h1>
            <p class="text-primary">Price: ${{$product->price}} </p>

            <hr>
            <p>{{$product->description}}</p>
            <h3 class="text-primary">Product Image</h3>
              <div class="row ">
                @foreach ($product->images as $image)
               <div class="col">
                <img  src="{{asset('product_image/'.$image->image)}}" alt="{{$image->image}}" style="width: 300px; height:300px; margin:10px;">
               </div>
              @endforeach  
            </div>
        </div>
    </div>
</div>
@endsection