@extends('layouts.master')

@section('title', 'Colegio | Registro')

@section('content')

<div class="container">
  <div class="card card-primary card-outline mt-5">
    <div class="card-header bg-gray">
      Registro de Colegio
    </div>
    <div class="card-body">
     
      {!! Form::open(['route' => 'schools.store', 'method' => 'POST']) !!}
        {{ csrf_field() }}

        @include('admin.schools.partials.form')

        <div class="form-group">
          {!! Form::button('Guardar &nbsp; <i class="far fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right']) !!}
          <a href="{{ URL::previous() }}" class="badge badge-primary"> <i class="fa fa-arrow-left"></i> Regresar </a>
        </div>
        
      {!! Form::close() !!}
      
    </div>
  </div>
</div>

@stop
