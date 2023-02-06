@extends('layout')
@section("content")
<div class="custom-product mt-3 ml-4">
    <div class="col-sm-10">
        <table class="table">
            <h3 >Product payable amount</h3><br><br>
            
            <tbody>
              <tr>
            
                <td>Amount</td>
                <td>Rs. {{$total}}</td>
                
              </tr>
              <tr>
                
                <td>Tax</td>
                <td>Rs. 0</td>
               
              </tr>
              <tr>
                
                <td>Delivery</td>
                <td>Rs. 100 </td>
               
              </tr>
              <tr>
                
                <td>Total Amount</td>
                <td>Rs. {{$total+100}}</td>
                
              </tr>
            </tbody>
          </table>
          <form action="/orderplace" method="POST">
            @csrf
            <div class="form-group ml-4">
              <label for="exampleInputEmail1">Address</label>
              <input type="textarea" class="form-control" name="address"  placeholder="Enter Address">
              
            </div>
            
            <div class="form-group ml-4">
                <label for="">Payment Method</label><br><br>
              <input type="radio" value="cash"  name="payment"><span>Online Payment</span><br><br>
              <input type="radio" value="cash"  name="payment"><span>EMI</span><br><br>
              <input type="radio" value="cash"  name="payment"><span>Cash on Delivery</span><br>
              
            </div>
            <button type="submit" class="btn btn-primary ml-4">Place Order</button>
          </form>
    </div>
</div>
@endsection 