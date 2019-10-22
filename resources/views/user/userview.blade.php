@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <br>
            @if ($user->image)
            <div class="profile-header-container">
                <div class="profile-header-img">
                    <img class="rounded-circle" src="{{ url('/images/'.$user->image) }}" height="200" width="200"/>
                </div>
            </div>
            @endif
            <div>
                <h3>{{ $user->name }}'s profile</h3>
                <h5>Name: {{ $user->name }}</h5>
                <h5>Email: {{ $user->email }}</h5>
                <h5>Phone Number: {{ $user->phone_number }}</h5>


                <a href="{{ route('edit') }}" class="btn btn-primary">Edit Profile</a>
            </div>
    </div>
</div>
@endsection
