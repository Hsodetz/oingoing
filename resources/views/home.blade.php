@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card card-default">
                    <div class="card-header"> {{ Auth()->user()->name}} bienvenid@ a nuestro sistema Waynakay </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p class="text-info"> Ya te encuentras en nustro sistema Waynakay. </p>
                        <p class="text-success"> El administrador del sistema debe darte un rol para que navegues por el sistema. </p>
                        <p class="text-warning"> Por ahora te rogamos cierres tu sesion (Logout). </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
