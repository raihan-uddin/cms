@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
	<a class="btn btn-success float-right" href="{{ route('posts.create')}}">Add Post</a>
</div>
<div class="card card-default">
	<div class="card-header">
		Posts
		<div class="card-body">
			<table class="table table-striped  table-hover table-bordered">
				<caption>Posts Table</caption>
				<thead>
					<tr>
						<th>Sl</th>
						<th>Image</th>
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
						<td>{{ $post->title }}</td>
						<td>
							<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
						</td>
						<td>
							<form action="{{ route('posts.destroy', $post->id) }}" method="POST" >
								@csrf
								@method('DELETE');
							<button type="submit" class="btn btn-sm btn-danger">Trash</button>	
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
