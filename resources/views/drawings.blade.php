@extends('layouts.app')
@section('content')

    <form method="post" action="{{route('drawing.search')}}">
        @csrf
        <div>
            <input name="item" type="text" placeholder="Search">
            <input name="submit" type="submit" class="btn btn-outline-dark" value="Search">
        </div>
    </form>

    <h3>Filters</h3>
    @foreach($categories as $category)
        <a href="{{route('drawing.index', ['category' => $category->id])}}" type="button" class="btn btn-outline-dark">{{$category->name}}</a>
    @endforeach

    <table class="table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Materials</th>
            <th>Category</th>
            <th>Details</th>
            <th>Image</th>
            <th></th>
        </tr>
        @foreach($drawings as $drawing)
            <tr>
                <td>{{ $drawing->id }}</td>
                <td>{{ $drawing->name }}</td>
                <td>{{ $drawing->materials }}</td>
                <td>{{ $drawing->category->name }}</td>
                <td>{{ $drawing->details }}</td>
                <td>{{ $drawing->image }}</td>
                <td><a href="{{ route('drawing.show', $drawing->id) }}" class="btn btn-outline-dark">Details</a></td>
            </tr>
        @endforeach
    </table>
@endsection
