@extends('layouts.master')

@section('title', 'Estudiante | Registro')

@section('content')

<div class="container">
  <div class="card card-primary card-outline mt-5">
    <div class="card-header">
      Registro de Estudiante
    </div>
    <div class="card-body">
     
      {!! Form::open(['route' => 'students.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}

        @include('admin.students.partials.form')

        <div class="form-group">
  
          {!! Form::button('Guardar &nbsp; <i class="far fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right']) !!}
          <a href="{{ URL::previous() }}" class="badge badge-primary"> <i class="fa fa-arrow-left"></i> Regresar </a>
          
        </div>
        
      {!! Form::close() !!}
      
    </div>
  </div>
</div>

@stop
