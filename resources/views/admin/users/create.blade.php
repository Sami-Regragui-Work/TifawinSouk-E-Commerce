@extends('admin.layout')
@section('title', 'New User')

@section('content')
    <div>
        <div>
            <h1>👥 New User</h1>
            <a href="{{ route('admin.users.index') }}">← Back</a>
        </div>

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            @include('admin.components.form', compact('fields'))

            <div>
                <a href="{{ route('admin.users.index') }}">Cancel</a>
                <button type="submit">Create User</button>
            </div>
        </form>
    </div>
@endsection
