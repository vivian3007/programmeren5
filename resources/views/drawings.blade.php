@extends('layouts.app')
@section('content')

    <h3>Search:</h3>
    <form method="post" action="{{route('drawing.search')}}">
        @csrf
        <div>
            <input name="item" type="text" placeholder="Search">
            <input name="submit" type="submit" class="btn btn-outline-dark">
        </div>
    </form>

    <h3>Filter on tags</h3>
    @foreach($categories as $category)
        <div>
            <a href="{{route('drawing.index', ['category' => $category->id])}}" type="button"
               class="btn btn-outline-dark">{{$category->name}}</a>
        </div>
    @endforeach

    <table class="table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Materials</th>
            <th>Category</th>
            <th>Details</th>
            <th>Image</th>
        </tr>
        @foreach($drawings as $drawing)
            <tr>
                <td>{{ $drawing->id }}</td>
                <td>{{ $drawing->name }}</td>
                <td>{{ $drawing->materials }}</td>
                <td>{{ $drawing->category->name }}</td>
                <td>{{ $drawing->details }}</td>
                <td>{{ $drawing->image }}</td>
            </tr>
        @endforeach
    </table>
@endsection
