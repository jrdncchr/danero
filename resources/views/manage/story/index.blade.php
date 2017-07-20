@extends('layouts.app')

@section('title', 'Manage My Stories')
@section('sub-title', 'Manage my Stories')

@section('content')
<div class="col-sm-6 col-sm-offset-3">

	@if (session('message'))
	    <div class="alert alert-success">
	        {{ session('message') }}
	    </div>
	@endif

	<div class="col-sm-12 text-center">
		<a href="{{ route('stories.create') }}" class="btn btn-sm btn-primary" style="margin-bottom: 10px;">Create a New Story</a>
	</div>
	<table class="table table-condensed">
		<tbody>
			@foreach ($stories as $story)
		        <tr>
		        	<td>
		        		<a href="{{ route('stories.show', $story->id) }}">
							<h4>{{ $story->title }}</h4>
							<p>{{ $story->created_at }}</p>
						</a>
		        	</td>
		        	<td>
		        		<a href="{{ route('stories.show', $story->id) }}" class="btn btn-xs btn-default">Edit</a>
	        			<form action="{{ route('stories.destroy', $story->id) }}" method="post" onsubmit="return confirmDelete();">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
							<button type="submit" class="btn btn-sm btn-default btn-xs">Delete</button>
						</form>

						<p style="margin-top: 10px;">
							@if ($story->active)
							<span class="badge alert-success">Active</span>
							@else
							<span class="badge">Inactive</span>
							@endif
						</p>
		        	</td>
		        </tr>
	    	@endforeach
		</tbody>
	</table>

	{{ $stories->links() }}
</div>
@endsection