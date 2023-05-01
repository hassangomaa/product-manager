


@extends('layouts.app')

@section('content')
    <form action="{{ route('products.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Upload Excel File</label>
            <input type="file" name="file" id="file" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

@endsection
