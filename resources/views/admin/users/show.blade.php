@extends('layouts.master')

@section('title', 'Waynakay | Usuario')

@section('content')

<div class="container">
  <div class="card card-primary card-outline mt-5">
    <div class="card-header">
      <h4> Usuario <strong> {{ $user->name }} </strong> </h4>     
    </div>
    <div class="card-body">
    
      <ul class="list-group">

        <div class="row">
          <div class="col-3">
            <li class="list-group-item">
              Provincia:  {{$user->province->name}}
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
      </ul>

    </div>
  </div>
</div>
@stop

