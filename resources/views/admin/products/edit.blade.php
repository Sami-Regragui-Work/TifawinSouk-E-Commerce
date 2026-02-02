@extends('admin.layout')
@section('title', 'Edit Product')

@section('content')
    <div>
        <div>
            <h1>📦 Edit Product</h1>
            <a href="{{ route('admin.products.index') }}">← Back</a>
        </div>

        <form action="{{ route('admin.products.update', $product) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.components.form', ['fields' => $fields, 'model' => $product])

            <div>
                <a href="{{ route('admin.products.index') }}">Cancel</a>
                <button type="submit">Update Product</button>
            </div>
        </form>
    </div>
@endsection
