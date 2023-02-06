@extends('layout')
@section("content")
<div class="custom-product">
    
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>My Order History</h4><br><br>
            
            @foreach ($order as $item)
            <div class=" row searched-items cart-list-devider">
                <div class="col-sm-3">
                    <a href="detail/{{$item->id}}">
                        <img class="trending-image" src="{{$item->gallery}}" alt="">
                        
                    </a>
                </div>
                <div class="col-sm-6">
                        <div class="">   
                            <h3>Name :  {{$item->name}}</h3>
                            <h6>Delivery status:  {{$item->status}}</h6>
                            <h6>Address :  {{$item->address}}</h6>
                            <h6>Payment :  {{$item->payment_status}}</h6>
                            <h6>PaymentMethod : {{$item->payment_method}}</h6>
                        </div>
                </div>
                
            </div>
           
            @endforeach
        </div>
    </div>
</div>
@endsection 