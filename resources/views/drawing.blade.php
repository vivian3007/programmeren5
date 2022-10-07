@extends('layouts.app')
@section('content')
    <a href="/drawings">Drawing</a>

    @foreach($details as $detail)
        <td>{{ $detail->id }}</td>
        <td>{{ $detail->name }}</td>
        <td>{{ $detail->materials }}</td>
        <td>{{ $detail->details }}</td>
        <td>{{ $detail->image }}</td>
    @endforeach
@endsection
