@extends('admin.layout')
@section('title', 'New Category')

@section('content')
    <div>
        <div>
            <h1>📁 New Category</h1>
            <a href="{{ route('admin.categories.index') }}">← Back</a>
        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            @include('admin.components.form', compact('fields'))

            <div>
                <a href="{{ route('admin.categories.index') }}">Cancel</a>
                <button type="submit">Create Category</button>
            </div>
        </form>
    </div>
@endsection
