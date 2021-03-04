@extends('layouts.company-layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 
            <div class="d-inline">
                <h5 class="card-title">List Of Employees</h5>
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Add New
                    </button>
                </div>
            </div>
            <div class="card">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">employee name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date Created</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($employees))
                        @foreach($employees as $key => $employee)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->created_at->diffForHumans()}}</td>
                            <td>
                                <a class="modalLink btn btn-warning" type="button" 
                                    data-id="{{$employee->id}}"
                                    data-name="{{$employee->name}}"
                                    data-email="{{$employee->email}}"
                                    data-toggle="modal" 
                                    data-target="#edit">
                                    Edit
                                </a>
                            </td>
                            <td><a class="btn btn-danger" href="{{ route('company.delete.employee', $employee->id) }}">Delete</a></td>
                        </tr>              
                        @endforeach
                        @else
                        <tr>
                            <td colspan="8">No record found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit employee</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form" action="{{ route('company.update.employee') }}" method="post">
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

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new employee</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form" method="POST" action="{{ route('company.create.employee') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="modal-body">
                    <company-employee-form></company-employee-form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add</button>
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
        $('.id').val($(this).data('id'));
        $('.name').val($(this).data('name'));
        $('.email').val($(this).data('email'));
    });
});
</script>
@endsection