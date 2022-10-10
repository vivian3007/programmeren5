@extends('layouts.app')
@section('content')

    @foreach($details as $detail)
        <td>{{ $detail->id }}</td>
        <td>{{ $detail->name }}</td>
        <td>{{ $detail->materials }}</td>
        <td>{{ $detail->details }}</td>
        <td>{{ $detail->image }}</td>
    @endforeach

    <br><a href="/index">Go back</a>

@endsection
