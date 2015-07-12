@extends('layouts.main')

@section('content')

	@if (Session::has('message'))
    	<div class="alert alert-info">
    		{{ Session::get('message') }}
    	</div>
	@endif

    <ul class="list-group">
    @foreach ($errors->all() as $error)
    	<li class="list-group-item">{{ $error }}</li>
    @endforeach
    </ul>

	<form method="POST" action="{{ route('articles.update', $articles->id) }}">
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title" value="{{ $articles->title }}">
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<textarea name="description">{{ $articles->description }}</textarea>
		</div>

		<input type="hidden" name="_method" value="PUT">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<button type="submit" class="btn btn-default">Send</button>
	</form>
@endsection