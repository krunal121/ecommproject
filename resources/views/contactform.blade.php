<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-4">
            <h2>Contact Us</h2><hr>
            <form action="{{route('send.email')}}" method="POST">
                @csrf
                @if(Session::has('error'))
                <div class="alert alert-success">{{Session::get('error')}}</div>
                @endif
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                    <div class="form--group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter a name" value="{{old('name')}}">
                        <span class="text-danger">@error('name'){{$message}}@enderror</span>
                    </div>
                    <div class="form--group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter a email" value="{{old('email')}}">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="form--group">
                        <label for="">Subject</label>
                        <input type="text" class="form-control" name="subject" placeholder="Enter a subject" value="{{old('subject')}}">
                        <span class="text-danger">@error('subject'){{$message}}@enderror</span>
                    </div>
                    <div class="form--group">
                        <label for="">Message</label>
                       <textarea name="message" class="form-control" cols="4" rows="4" {{old('message')}}></textarea>
                        <span class="text-danger">@error('message'){{$message}}@enderror</span>
                    </div>

                    <button class="btn btn-primary">Send</button>
            </form>

        </div>
    </div>
    
</body>
</html>