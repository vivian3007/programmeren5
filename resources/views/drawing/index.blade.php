@extends('layouts.app')
@section('content')

    <h2>List of drawings</h2>

    <form method="post" action="{{route('drawing.search')}}">
        @csrf
        <div>
            <input name="item" type="text" placeholder="Search">
            <input name="submit" type="submit" class="btn btn-outline-dark" value="Search">
        </div>
    </form>

    <h4>Filters</h4>
    @foreach($categories as $category)
        <a href="{{route('drawing.index', ['category' => $category->id])}}" type="button" class="btn btn-outline-dark">{{$category->name}}</a>
    @endforeach

    <table class="table">
        <tr>
            <th></th>
            <th>Name</th>
            <th>Materials</th>
            <th>Category</th>
            <th>Description</th>
            <th></th>
        </tr>
        @foreach($drawings as $drawing)
            <tr>
                <td><img src="{{ asset("images/$drawing->image") }}" alt="mermaid" style="height:100px;"></td>
                <td>{{ $drawing->name }}</td>
                <td>{{ $drawing->materials }}</td>
                <td>{{ $drawing->category->name }}</td>
                <td>{{ $drawing->details }}</td>
                <td><a href="{{ route('drawing.show', $drawing->id) }}" class="btn btn-outline-dark">Details</a></td>
            </tr>
        @endforeach
    </table>
@endsection
