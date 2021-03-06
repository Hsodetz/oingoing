@extends('layouts.master')

@section('title', 'Padre | Edicion')

@section('content')

<div class="container">
  <div class="card card-primary card-outline mt-5">
    <div class="card-header">
      Editar Atributos Padre
    </div>
    <div class="card-body">

      {!! Form::model($father, ['route' => ['fathers.update', $father->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}

        @include('admin.fathers.partials.form')

        <div class="form-group">
          {!! Form::button('Actualizar &nbsp; <i class="fas fa-cogs"></i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right']) !!}
          <a href="{{ URL::previous() }}" class="badge badge-primary"> <i class="fa fa-arrow-left"></i> Regresar </a>
        </div>

      {!! Form::close() !!}

    </div>
  </div>
</div>

@stop
