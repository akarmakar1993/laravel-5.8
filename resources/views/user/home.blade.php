@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hello {{Auth::user()->name}}, Welcome to Laravel 5.8!
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <h4>Welcome to our website</h4>
</div>
@endsection
