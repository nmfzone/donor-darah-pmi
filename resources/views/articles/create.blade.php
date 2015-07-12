@extends('layouts.main')
@section('content')

    <ul class="list-group">
    @foreach ($errors->all() as $error)
    	<li class="list-group-item">{{ $error }}</li>
    @endforeach
    </ul>

	<form method="POST" action="{{ route('articles.store') }}">
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Input">
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<textarea name="description"></textarea>
		</div>

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<button type="submit" class="btn btn-default">Send</button>
	</form>
@endsection