@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p><a class="btn btn-primary" href="/posts/create">Create post</a></p> 
                    <h3 class="card-text">Your blog posts</h3>

                </div>
            </div>
        </div>
    </div>
@endsection
