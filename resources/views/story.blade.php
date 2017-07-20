@extends('layouts.app')

@section('title', 'Stories')
@section('sub-title', 'Stories')

@section('content')
<div class="col-sm-6 col-sm-offset-3">
	<div class="list-group">
    	@foreach ($stories as $story)
	        <a href="#" class="list-group-item" style="height: 180px;">
				<img src="http://via.placeholder.com/150x150" class="img-rounded story-img-sm"> 
				<h4 class="list-group-item-heading">{{ $story->title }}</h4>
				<p class="list-group-item-text">{{ $story->shortContent }}</p>
			</a>
	    @endforeach
	</div>
	{{ $stories->links() }}
</div>
@endsection