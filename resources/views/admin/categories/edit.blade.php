@extends('admin.layout')
@section('title', 'Edit Category')

@section('content')
    <div>
        <div>
            <h1>📁 Edit Category</h1>
            <a href="{{ route('admin.categories.index') }}">← Back</a>
        </div>

        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.components.form', ['fields' => $fields, 'model' => $category])

            <div>
                <a href="{{ route('admin.categories.index') }}">Cancel</a>
                <button type="submit">Update Category</button>
            </div>
        </form>
    </div>
@endsection
