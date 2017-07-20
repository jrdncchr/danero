@extends('layouts.app')

@section('title', isset($story) ? 'Edit Story' : 'Add Story')
@section('sub-title', isset($story) ? 'Edit Story' : 'Add Story')

@section('content')
<div class="col-sm-6 col-sm-offset-3">
	<a class="btn btn-sm" href="{{ route('stories.index') }}" style="margin-bottom: 10px;">&larr; Back</a>

	@if (session('message'))
	    <div class="alert alert-success">
	        {{ session('message') }}
	    </div>
	@endif

	@if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ isset($post) ? route('stories.edit', $story->id) : route('stories.store') }}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ isset($story) ? $story->title : '' }}" />
		</div>
		<div class="form-group">
			<label for="content">Content</label>
			<textarea class="form-control" id="content" name="content" rows="5">{{ isset($story) ? $story->content : '' }}</textarea>
		</div>
		<div class="form-group">
			<label for="image">Image</label>
			<input type="file" name="file" id="image">
			<p class="help-block">Select an image for this story.</p>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" name="active" {{ isset($story) && $story->active ? 'checked' : '' }}> Active
			</label>
		</div>
		<button type="submit" class="btn btn-primary pull-right btn-sm">Save</button>
	</form>
	
	@if (isset($story))
	<form action="{{ route('stories.destroy', $story->id) }}" method="post" onsubmit="return confirmDelete();">
		{{ method_field('DELETE') }}
		{{ csrf_field() }}
		<button type="submit" class="btn btn-sm btn-default pull-right" style="margin-right: 5px;">Delete</button>
	</form>
	@endif
</div>
@endsection