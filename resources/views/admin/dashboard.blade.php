@extends('layouts.admin-layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('checked-user-male.png') }}" class="img img-responsive mb-2"  width="72" height="72" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Name: {{$admin->name}}</h5>
                                    <h6 class="card-text">Email: {{$admin->email}}</h6>
                                    <a class="card-text" href="{{ route('admin.show.companies') }}" class="btn btn-primary">
                                        <button class="btn btn-info">List of companies</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
