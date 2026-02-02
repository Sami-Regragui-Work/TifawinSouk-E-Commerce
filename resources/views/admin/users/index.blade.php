@extends('admin.layout')
@section('title', 'Users')

@section('content')
    <div>
        <div>
            <h1>👥 Users</h1>
            <a href="{{ route('admin.users.create') }}">+ New User</a>
        </div>
        @include('admin.components.table', ['table' => 'users', 'rows' => $users, 'columns' => $columns])
    </div>
@endsection
