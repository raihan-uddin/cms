@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
	<a class="btn btn-success float-right" href="{{ route('categories.create')}}">Add Category</a>
</div>
<div class="card card-default">
	<div class="card-header">
		Categories
		<div class="card-body">
			<table class="table table-striped  table-hover table-bordered">
				<caption>Categories Table</caption>
				<thead>
					<tr>
						<th>Sl</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $key => $category)
					<tr>
						<td>{{ ++$key }}</td>
						<td>{{ $category->name }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
