@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <div class="card-body">
                        <img src="{{ asset('checked-user-male.png') }}" class="img img-responsive mb-2"  width="72" height="72" alt="...">
                        <h5 class="card-title"><b>Username: </b>{{$user->name}}</h5>
                        <p class="card-text"><b>Email: </b>{{$user->email}}</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><b>Company name: </b> {{$company->name}} </li>
                        <li class="list-group-item"><b>Company email: </b> {{$company->email}} </li>
                    </ul>
                    <div class="card-body">
                        <a type="button" class="modalLink card-lin btn btn-warning"
                            data-toggle="modal" data-target="#edit"
                            data-name="{{$user->name}}"
                            data-email="{{$user->email}}"
                            > 
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profie Edit</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form" action="{{ route('employee.update.profile') }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <company-employee-form></company-employee-form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>

@endsection

@section('page-js')
<script type="text/javascript">
$(document).ready(function() { 
    $('.modalLink').on('click', function() {
        // append data to form
        $('.name').val($(this).data('name'));
        $('.email').val($(this).data('email'));
    });
});
</script>
@endsection
