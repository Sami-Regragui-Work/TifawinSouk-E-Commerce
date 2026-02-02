@extends('admin.layout')
@section('title', 'Categories')

@section('content')
    <div>
        <div>
            <h1>📁 Categories</h1>
            <a href="{{ route('admin.categories.create') }}">+ New Category</a>
        </div>
        @include('admin.components.table', ['table' => 'categories', 'rows' => $categories, 'columns' => $columns])
    </div>
@endsection
