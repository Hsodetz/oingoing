@extends('layouts.master')

@section('title', 'Waynakay | Padre')

@section('content')

<div class="container">
  <div class="card card-primary card-outline mt-5">
    <div class="card-header">
      <h4> Padre <strong>  </strong> </h4>     
    </div>
    <div class="card-body">
    
      <ul class="list-group">

        <div class="row">
          <div class="col-3">
            <li class="list-group-item">
              Provincia:  
            </li>
          </div>
          <div class="col-3">
            <li class="list-group-item">
              Ciudad:  
            </li>
          </div>
          <div class="col">
            <li class="list-group-item">
              Direccion: 
            </li>
          </div>
        </div>
      </ul>

    </div>
  </div>
</div>
@stop