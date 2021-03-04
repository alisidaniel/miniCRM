<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRM </title>
         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
            
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-2 mb-3 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Mini CRM</a>
            <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    @if (Route::has('login'))
                        @auth
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        @else
                        <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                        @endauth
                    @endif
                </li>
            </ul>
        </nav>

        <div class="container-fluid mt-4">
            <div class="row">

                <!-- @include('layouts.sidebar') -->

                <main role="main" class="col-md-9 col-lg-10 offset-1 of px-4">
                    <br>
                    <h2 class="mt-4">List of companies</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Company name</th>
                                <th>Email</th>
                                <th>Date Created</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($companies))
                                @foreach($companies as $key => $company)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->email}}</td>
                                    <td>{{$company->created_at->diffForHumans()}}</td>
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
                    <div class="d-flex justify-content-end mt-1">
                        {{ $companies->links() }}
                    </div>
                </main>
            </div>
        </div>
        <!-- Icons -->
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
        feather.replace()
        </script>
    </body>
</html>
