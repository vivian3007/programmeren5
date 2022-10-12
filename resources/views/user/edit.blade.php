@extends('layouts.app')
@section('content')

    <form action="{{ route('user.update', $id) }}" method="POST">
        @csrf
        @method('PUT')
        @foreach($details as $detail)
            <div>
                <label for="name">Name*</label><br>
                <input type="text" id="name" name="name" value="{{ $detail->name }}"><br>
                <span style="color:red">@error('name'){{ $message }} @enderror</span>
            </div>
            <div>
                <label for="materials">Email*</label><br>
                <input type="text" id="materials" name="materials" value="{{ $detail->email }}"><br>
{{--                <span style="color:red">@error('email'){{ $message }} @enderror</span><br>--}}
            </div>
{{--            <div>--}}
{{--                <label for="password">{{ __('Password') }}</label><br>--}}
{{--                <input id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"><br>--}}

{{--                    @error('password')--}}
{{--                        <span role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                    @enderror--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <label for="password-confirm">{{ __('Confirm Password') }}</label><br>--}}
{{--                <input id="password-confirm" type="password" required autocomplete="new-password"><br>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <label for="password">Password</label><br>--}}
{{--                <input id="password" type="password" name="password" value=""/>--}}
{{--                <span style="color:red">@error('password'){{ $message }} @enderror</span><br>--}}
{{--            </div><br>--}}
            <br><div>
                <input type="submit" class="btn btn-outline-dark" value="Save">
            </div>

        @endforeach
    </form>

    <br><a href="{{ route('user.show', $id) }}" class="btn btn-outline-dark">Go back</a>

@endsection
