@extends('layouts.app')

@section('content')
<div class="card card-default">
	<div class="card-header">
		Users
		<div class="card-body">
			@if($users->count() > 0)
			<table class="table table-striped  table-hover ">
				<caption>users Table</caption>
				<thead>
					<tr>
						<th>Sl</th>
						<th>Image</th>
						<th>Name</th>
						<th>Email</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $key => $user)
					<tr>
						<td>{{ ++$key }}</td>
						<td>
							<img width="40px" height="40px" style="border-radius: 50%;" src="{{ Gravatar::src($user->email) }}" alt="">							
						</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>
							@if(!$user->isAdmin())
							<form action="{{ route('users.make-admin', $user->id )}}" method="post">
								@csrf
							<button class="btn btn-sm btn-success" type="submit">Make admin</button>
							</form>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@else
		<h3 class="text-center">No user yet!</h3>
		@endif
	</div>
</div>
@endsection
