@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
	<a class="btn btn-success float-right" href="{{ route('tags.create')}}">Add Tag</a>
</div>
<div class="card card-default">
	<div class="card-header">
		Tags
		<div class="card-body">
			@if($tags->count() > 0)

			<table class="table table-striped  table-hover">
				<caption>Tags Table</caption>
				<thead>
					<tr>
						<th>Sl</th>
						<th>Name</th>
						<th>Posts Count</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tags as $key => $tag)
					<tr>
						<td>{{ ++$key }}</td>
						<td>{{ $tag->name }}</td>
						<td>0</td>
						<td>
							<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info btn-sm">Edit</a>
							<button type="button" class="btn btn-sm btn-danger" onclick="handleDelete({{ $tag->id }})">Delete</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<!-- Modal -->

			<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<form method="POST" id="deleteTagForm">
						@csrf
						@method('DELETE')
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p class="text-center text-bold">Are you sure you want to delete this tag?</p>							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
								<button type="submit" class="btn btn-danger">Yes, Delete</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		@else
		<h3 class="text-center">No tags yet!</h3>
		@endif
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	function handleDelete(id){
		//console.log(id);
		var url = '/tags/' + id;
		var form = $('#deleteTagForm').attr('action', url);

		$("#deleteModal").modal('show');

	}
</script>
@endsection
