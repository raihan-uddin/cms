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
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $key => $category)
					<tr>
						<td>{{ ++$key }}</td>
						<td>{{ $category->name }}</td>
						<td>
							<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
							<button type="button" class="btn btn-sm btn-danger" onclick="handleDelete({{ $category->id }})">Delete</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<!-- Modal -->

			<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<form method="POST" id="deleteCategoryForm">
						@csrf
						@method('DELETE')
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p class="text-center text-bold">Are you sure you want to delete this category?</p>							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
								<button type="submit" class="btn btn-danger">Yes, Delete</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	function handleDelete(id){
		//console.log(id);
		var url = '/categories/' + id;
		var form = $('#deleteCategoryForm').attr('action', url);

		$("#deleteModal").modal('show');

	}
</script>
@endsection
