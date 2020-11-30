@extends('layouts.app')
@section('content')
2
{{-- @if($errors->any())
	<div class="alert alert-danger">
		@foreach($errors->all() as $error )
			<li>{{ $error }}</li>
		@endforeach
	</div>
@endif --}}
	<div class="container">
		
		<form action="{{ route('admincreateproduct') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="text" name="title" placeholder="title" class="form-control mt-2" >
{{-- 			<input type="text" name="title" placeholder="title" class="form-control mt-2" @error('title') is-invalid @enderror value="{{ old('title') }}" > --}}
{{-- 			@error('title')
				<span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror --}}
	        
			<textarea class="form-control mt-2 " name="description"></textarea>
			<input type="file" name="image" placeholder="image" class="form-control mt-2">
			<button class="btn btn-primary w-100">save</button>
		</form>
	</div>

@endsection