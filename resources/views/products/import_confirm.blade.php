@extends('layouts.app')

@section('content')

    <h3>Confirm Import</h3>
    <form action="{{ route('products.import.process') }}" method="post">
        @csrf
        <table>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Quantity</th>
            </tr>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row[$mapping['name']] }}</td>
                    <td>{{ $row[$mapping['type']] }}</td>
                    <td>{{ $row[$mapping['qty']] }}</td>
                </tr>
            @endforeach
        </table>
        <input type="hidden" name="mapping" value="{{ json_encode($mapping) }}">
        <input type="submit" value="Import">
    </form>

@endsection
