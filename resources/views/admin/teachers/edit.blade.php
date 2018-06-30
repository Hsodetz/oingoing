@extends('layouts.master')

@section('title', 'Profesor | Edicion')

@section('content')

<div class="container">
  <div class="card card-primary card-outline mt-5">
    <div class="card-header">
      Editar Profesor
    </div>
    <div class="card-body">
     
      {!! Form::model($teacher, ['route' => ['teachers.update', $teacher->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}

        @include('admin.teachers.partials.form')

        <div class="form-group">
          {!! Form::button('Actualizar &nbsp; <i class="fas fa-cogs"></i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right']) !!}
          <a href="{{ URL::previous() }}" class="badge badge-primary"> <i class="fa fa-arrow-left"></i> Regresar </a>
        </div>
        
      {!! Form::close() !!}
      
    </div>
  </div>
</div>

@stop