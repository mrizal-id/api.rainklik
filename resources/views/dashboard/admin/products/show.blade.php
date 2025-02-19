@extends('layouts.app')

@section('content')
    <h1>Product Details: {{ $product->title }}</h1>

    <div class="row">
        <div class="col-md-6">
            @if ($product->image_url)
                <img src="{{ Storage::url($product->image_url) }}" alt="Product Image" class="img-fluid">
            @else
                <p>No image available</p>
            @endif
        </div>
        <div class="col-md-6">
            <h3>Price: {{ $product->price }}</h3>
            @if ($product->discount_price)
                <p><strong>Discount Price: {{ $product->discount_price }}</strong></p>
            @endif

            <h4>Description</h4>
            <p>{{ $product->description }}</p>

            <h5>Category: {{ $product->category ? $product->category->title : 'N/A' }}</h5>
            <h5>Type: {{ ucfirst($product->type) }}</h5>
            <h5>Stock: {{ $product->stock }}</h5>
            <h5>Shipping Method: {{ $product->shippingMethod ? $product->shippingMethod->name : 'N/A' }}</h5>
            <h5>Active: {{ $product->is_active ? 'Yes' : 'No' }}</h5>
        </div>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Product List</a>
@endsection
