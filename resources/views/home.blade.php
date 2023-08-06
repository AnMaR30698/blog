@extends('inc.navebar')
@extends('layouts.app')


@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--  {{ __('You are logged in!') }}  --}}
                    <div class="dashboard">
                        <ul>
                            <li><a href="{{ route('create.blog') }}">Create post</a></li>
                            <li><a href="{{ route('categories.create') }}">create category</a></li>
                            <li><a href="{{ route('categories.index') }}">Categories list</a></li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
