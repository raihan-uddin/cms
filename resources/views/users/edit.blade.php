@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">My  Profile</div>

    <div class="card-body">
        @include('partials.errors')
        <form action="{{ route('users.update-profile') }}" method="POST" accept-charset="utf-8">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="" id="name">
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea name="about" class="form-control" cols="" rows="5">{{ $user->about }}</textarea>
            </div>
            <button class="btn btn-success" type="submit">Update</button>
        </form>
    </div>
</div>
@endsection
