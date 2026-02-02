@extends('admin.layout')
@section('title', 'Edit User')

@section('content')
    <div>
        <div>
            <h1>👥 Edit User</h1>
            <a href="{{ route('admin.users.index') }}">← Back</a>
        </div>

        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.components.form', ['fields' => $fields, 'model' => $user])

            <div>
                <a href="{{ route('admin.users.index') }}">Cancel</a>
                <button type="submit">Update User</button>
            </div>
        </form>
    </div>
@endsection
