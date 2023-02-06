@extends('layout')
@section("content")
<div class="custom-product">
    
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Result for Product</h4>
            <a class="btn btn-success" href="/ordernow">Order now</a><br><br>
            @foreach ($products as $item)
            <div class=" row searched-items cart-list-devider">
                <div class="col-sm-3">
                    <a href="detail/{{$item->id}}">
                        <img class="trending-image" src="{{$item->gallery}}" alt="">
                        
                    </a>
                </div>
                <div class="col-sm-6">
                        <div class="">   
                            <h3>{{$item->name}}</h3>
                            <h6>{{$item->description}}</h6>
                        </div>
                </div>
                <div class="col-sm-3">
                    <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove to cart</a>
                </div>
            </div>
           
            @endforeach
        </div>
    </div>
</div>
@endsection 