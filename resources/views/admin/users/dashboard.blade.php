@extends('layouts.master')

@section('title', 'Padre | Dashboard')

@section('content')

<div class="container">
  <div class="card card-primary card-outline mt-5">
    <div class="card-header">
      Dashboard
    </div>
    <div class="card-body">
     
      <h5> Bienvenido {{ Auth::user()->name }} estas en el rol Waynakay </h5>
      
    </div>
  </div>
</div>

@stop