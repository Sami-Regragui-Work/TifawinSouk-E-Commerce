@extends('admin.layout')
@section('title', 'New Product')

@section('content')
    <div>
        <div>
            <h1>📦 New Product</h1>
            <a href="{{ route('admin.products.index') }}">← Back</a>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            @include('admin.components.form', compact('fields'))

            <div>
                <a href="{{ route('admin.products.index') }}">Cancel</a>
                <button type="submit">Create Product</button>
            </div>
        </form>
    </div>
@endsection
