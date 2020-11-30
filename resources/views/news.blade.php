@extends("layouts.app")
@section("content")
	<div class="container" >
		<form action="{{ route('savenews') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="text" name="title" class="form-control mt-2 @error('title') is-invalid @enderror" placeholder="title">
			@error('title')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<textarea name="description" class="form-control mt-2" placeholder="description"></textarea>
			<textarea name="short_description" class="form-control mt-2 @error('short_description') is-invalid @enderror" placeholder="short_description"></textarea>
			@error('short_description')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<input type="file" name="image" class="form-control mt-2">
			<input type="date" name="add_date" class="form-control mt-2" placeholder="add_date">
			<input  name="category_id" type="hidden" class="form-control mt-2" placeholder="category_id" value="1">
			<select >
				@foreach(App\Category::get() as $category)
					<option value="{{ $category->id }}"> {{ $category->title }}</option>
				@endforeach
			</select>
			
			<input type="text" name="tags[]" class="form-control mt-2" placeholder="tags">
			<input type="text" name="tags[]" class="form-control mt-2" placeholder="tags">
			<input type="text" name="tags[]" class="form-control mt-2" placeholder="tags">
			<input type="text" name="tags[]" class="form-control mt-2" placeholder="tags">
			<button class="btn btn-warning mt-2 w-50 " style="margin-left: 25%" >save</button>
		</form>
	</div>
@endsection