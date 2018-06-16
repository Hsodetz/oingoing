@extends('layouts.master')

@section('title', 'Colegio | Ver')

@section('content')

<div class="container">
  <div class="card card-primary card-outline mt-5">
    <div class="card-header bg-gray">
      Ver Colegio {{ $school->name }}
    </div>
    <div class="card-body">
     
      <div class="row">
        <div class="col-md-4">
          <div class="small-box bg-success">
            <div class="inner">
              <h4>Nombres</h4>
              <p>{{ $school->name }}</p>
            </div>
            <div class="icon">
              <i class="fas fa-american-sign-language-interpreting"></i>
            </div>
            <a href="{{ route('schools.edit', $school->id) }}" class="small-box-footer"> Editar <i class="fas fa-edit"></i></a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="small-box bg-success">
            <div class="inner">
              <h4>Direccion</h4>
              <p>{{ $school->address }}</p>
            </div>
            <div class="icon">
              <i class="far fa-building"></i>
            </div>
            <a href="{{ route('schools.edit', $school->id) }}" class="small-box-footer"> Editar <i class="fas fa-edit"></i></a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="small-box bg-success">
            <div class="inner">
              <h4>Direccion</h4>
              <p>{{ $school->city->name }}</p>
            </div>
            <div class="icon">
              <i class="fas fa-map-marker"></i>
            </div>
            <a href="{{ route('schools.edit', $school->id) }}" class="small-box-footer"> Editar <i class="fas fa-edit"></i></a>
          </div>
        </div>

      </div>
      
    </div>
  </div>
</div>

@stop