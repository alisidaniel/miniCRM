@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('User Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><b>Username: </b>{{$user->name}}</h5>
                        <p class="card-text"><b>Mail: </b>{{$user->email}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Company name: </b> {{$company->name}} </li>
                        <li class="list-group-item"><b>Company email: </b> {{$company->email}} </li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link"> link</a>
                        <a href="#" class="card-link"> link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
