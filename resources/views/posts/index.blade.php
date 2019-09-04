@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
	<a class="btn btn-success float-right" href="{{ route('posts.create')}}">Add Post</a>
</div>
<div class="card card-default">
	<div class="card-header">
		Posts
		<div class="card-body">
			@if($posts->count() > 0)
			<table class="table table-striped  table-hover ">
				<caption>Posts Table</caption>
				<thead>
					<tr>
						<th>Sl</th>
						<th>Image</th>
						<th>Category</th>
						<th>Title</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $key => $post)
					<tr>
						<td>{{ ++$key }}</td>
						<td>
							<img class="img img-thumbnail" src="{{ asset(('storage/' . $post->image)) }}" alt="Not Found!" height="100" width="100">
						</td>
						<td><a href="{{ route('categories.edit',  $post->category->id) }}" >{{ $post->category->name }}</a></td>
						<td>{{ $post->title }}</td>
						@if($post->trashed())
						<td>
							<form action="{{ route('restore-post', $post->id) }}" method="post" >
								@csrf
								@method('PUT')
								<button type="submit" class="btn btn-info btn-sm">Restore</button>
							</form>
						</td>
						@else
						<td>	
							<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
						</td>
						@endif
						<td>
							<form action="{{ route('posts.destroy', $post->id) }}" method="POST" >
								@csrf
								@method('DELETE')
							<button type="submit" class="btn btn-sm btn-danger">{{ $post->trashed() ? 'Delete' : 'Trash'}}</button>	
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@else
		<h3 class="text-center">No post yet!</h3>
		@endif
	</div>
</div>
@endsection
