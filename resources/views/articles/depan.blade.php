@extends('layouts.main')

@section('content')

	@if (Session::has('message'))
    	<div class="alert alert-info">
    		{{ Session::get('message') }}
    	</div>
	@endif
	
	<div class="list-group">
	@foreach($articles as $article)
		<a href="#" class="list-group-item active">
			<h4 class="list-group-item-heading">{{ $article->title }}</h4>
			<p class="list-group-item-text">
				<a href="{{ url('articles/'.$article->id.'/edit') }}">Edit</a><br>
				{{ $article->description }}
			</p>
		</a>
	@endforeach
	</div>
@endsection