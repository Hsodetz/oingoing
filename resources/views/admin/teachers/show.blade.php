@extends('layouts.master')

@section('title', 'Waynakay | Padre')

@section('content')

<div class="container">
  <div class="card card-primary card-outline mt-5">
    <div class="card-header">
      <h4> <strong> {{ $user->name }} {{ $user->last_name }} </strong> </h4> 
      @if($teacher == "")
      @else 
      <img src="../imagenes/profesores/{{ $teacher->image }}" width="150" height="100" class="img-rounded elevation-2">   
      @endif
    </div>
    <div class="card-body">
    
      <ul class="list-group">

        <div class="row">
          <div class="col-3">
            <li class="list-group-item">
              Provincia: {{ $user->province->name }} 
            </li>
          </div>
          <div class="col-3">
            <li class="list-group-item">
              Ciudad:  {{ $user->city->name }}
            </li>
          </div>
          <div class="col">
            <li class="list-group-item">
              Direccion: {{ $user->address }}
            </li>
          </div>
        </div>
        
        
       
      @if ($teacher == "")
        <h2 class="text-success"> Puedes agregar mas atributos </h2>
      @else
        <div class="row mt-2">
        <div class="col-3">
          <li class="list-group-item">
            Direccion Trabajo: {{ $teacher->profession }} 
          </li>
        </div>
        <div class="col-3">
          <li class="list-group-item">
            Telefono Trabajo: {{ $teacher->level_study }} 
          </li>
        </div>
        <div class="col">
          <li class="list-group-item">
            
          </li>
        </div>
        </div>
      @endif
       
      </ul>
    </div>
    <a href="{{ URL::previous() }}">Regresar</a>
  </div>
</div>

@stop