@extends('layouts.master')

@section('title', 'Profesor | Registro')

@section('content')

<div class="container">
  <div class="card card-primary card-outline mt-5">
    <div class="card-header">
      Registro de Profesor
    </div>
    <div class="card-body">
     
      {!! Form::open(['route' => 'teachers.store', 'method' => 'POST']) !!}
        {{ csrf_field() }}

        @include('admin.teachers.partials.form')
        
      {!! Form::close() !!}
      
    </div>
  </div>
</div>

@stop
