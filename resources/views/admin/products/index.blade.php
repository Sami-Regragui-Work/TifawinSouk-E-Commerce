@extends('admin.layout')
@section('title', 'Products')

@section('content')
    <div>
        <div>
            <h1>📦 Products</h1>
            <a href="{{ route('admin.products.create') }}">+ New Products</a>
        </div>
        @include('admin.components.table', ['table' => 'products', 'rows' => $products, 'columns' => $columns])
    </div>
@endsection
