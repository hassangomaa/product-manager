<!-- resources/views/products/import.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Import Products') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('products.upload') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Select File') }}</label>

                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" required>

                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name_column" class="col-md-4 col-form-label text-md-right">{{ __('Name Column') }}</label>

                                <div class="col-md-6">
                                    <select id="name_column" class="form-control @error('name_column') is-invalid @enderror" name="name_column">
                                        @foreach($columns as $column)
                                            <option value="{{ $column }}">{{ $column }}</option>
                                        @endforeach
                                    </select>

                                    @error('name_column')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type_column" class="col-md-4 col-form-label text-md-right">{{ __('Type Column') }}</label>

                                <div class="col-md-6">
                                    <select id="type_column" class="form-control @error('type_column') is-invalid @enderror" name="type_column">
                                        @foreach($columns as $column)
                                            <option value="{{ $column }}">{{ $column }}</option>
                                        @endforeach
                                    </select>

                                    @error('type_column')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="qty_column" class="col-md-4 col-form-label text-md-right">{{ __('Quantity Column') }}</label>

                                <div class="col-md-6">
                                    <select id="qty_column" class="form-control @error('qty_column') is-invalid @enderror" name="qty_column">
                                        @foreach($columns as $column)
                                            <option value="{{ $column }}">{{ $column }}</option>
                                        @endforeach
                                    </select>

                                    @error('qty_column')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Import') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
