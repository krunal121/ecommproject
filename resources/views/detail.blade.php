@extends('layout')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{$product['gallery']}}" alt="">
        </div>
        <div class="col-sm-6 mt-4">
            <a name="" id="" class="btn btn-info" href="/product" role="button">Go Back</a>
            <h2>{{$product['name']}}</h2><br>
            <h3>
                Category:  {{$product['category']}}
            </h3>   
            <h4>Price:  {{$product['price']}} Rs.</h4>
            <h4>Specification:<ul>
                <li>{{$product['description']}}
                    </li></ul>
            </h4>       
                 <br><br>
           <form action="/add_to_cart" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$product['id']}}">
            <button class="btn btn-primary">Add to Cart</button>
           </form><br>
           <button class="btn btn-success">Buy now</button>
        </div>
    </div>
</div>
@endsection