@extends('layouts.admin-layout.app')

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
                <h5 class="card-title">List Of Companies</h5>
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
                            <th scope="col">Company name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date Created</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($companies))
                        @foreach($companies as $key => $company)
                        <tr class="foo">
                            <th scope="row">{{$key+1}}</th>
                            <td class="name">{{$company->name}}</td>
                            <td class="email">{{$company->email}}</td>
                            <td>{{$company->created_at->diffForHumans()}}</td>
                            <td>
                                <a class="modalLink btn btn-warning" type="button" 
                                    data-id="{{$company->id}}"
                                    data-name="{{$company->name}}"
                                    data-email="{{$company->email}}"
                                    data-url="{{$company->url}}"
                                    data-toggle="modal" data-target="#edit">
                                    Edit
                                </a>
                            </td>
                            <td><a class="btn btn-danger" href="{{ route('admin.delete.company', $company->id) }}">Delete</a></td>
                            <td><a class="btn btn-primary" href="{{ route('admin.show.empoyee', $company->id) }}"> View Employee</a></td>
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
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit company</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form" action="{{ route('admin.update.company') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <!--- form --->
                    <company-form></company-form>
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
                <h5 class="modal-title" id="exampleModalLabel">Add new company</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form" method="POST" action="{{ route('admin.create.company') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="modal-body">
                     <company-form></company-form>
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
        $('#id').val($(this).data('id'));
        $('#name').val($(this).data('name'));
        $('#email').val($(this).data('email'));
        $('#url').val($(this).data('url'));
    });
});
</script>
@endsection
