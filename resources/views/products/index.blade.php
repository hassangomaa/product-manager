<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                    <a  href="{{ route('products.import') }}" class="btn btn-outline-success">Import Products</a>
                </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Products</div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Quantity</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <th scope="row">{{ $product->id }}</th>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->type }}</td>
                                                <td>{{ $product->qty }}</td>
                                                <td>{{ $product->created_at }}</td>
                                                <td>{{ $product->updated_at }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
