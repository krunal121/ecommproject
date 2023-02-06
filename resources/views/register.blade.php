@extends('layout')
@section('content')



    <div class="container ">
    <div class="row ">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="{{url('/registration')}}" method="POST">
            <div class="form-group">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif  
                @csrf
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter user name">
                <span class="text-danger">@error('name'){{$message}}@enderror</span>
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                <span class="text-danger">@error('password'){{$message}}@enderror</span>
              </div>
              
              <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
        </div>
    </div>
</div>
@endsection