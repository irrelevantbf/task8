@extends('layouts.app')

@section('content')
<div class="container">
    <div>
            

<div class="container" style="text-align: center;">
        <form method="POST" action=" {{ route('productsstore') }} ">
            @csrf
            <br>
            <h1>INPUT PRODUCT</h1>

            <br>
            <label><b>title</b></label>
            
            <input class="form-control" type="text" name="title" placeholder="enter title">
            
            <br>
            <label><b>description</b></label>
            
            <textarea class="form-control" name="description" placeholder="enter description"></textarea>
            
            <br>
            <button class="btn btn-primary " type="submit" style="margin-left: 45%" >submit</button>
        </form>
        
</div>
@endsection
