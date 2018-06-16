
@extends('layouts.master')

@section('title', 'Colegios')

@section('content')

<div class="container">
  <div class="card card-primary card-outline mt-5">
    <div class="card-header bg-gray">
      Listado de Colegios    
      @can('schools.create')
        <a href="{{ route('schools.create') }}" class="badge badge-primary float-right"> Crear <i class="fas fa-plus"></i> </a>  
      @endcan 
    </div>
    <div class="card-body">
     
      <table id="schoolsTable" class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Direccion</th>
            <th scope="col">Ciudad</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          
          @foreach ($schools as $school)
          <tr>
            <td> {{ $school->name }} </td>
            <td> {{ $school->address }} </td>
            <td> {{ $school->city->name }} </td>
            <td width="10px">
              @can('schools.show')
                <a class="btn btn-sm btn-primary" href="{{ route('schools.show', $school->id) }}"> Ver </a>
              @endcan
            </td>
            <td width="10px">
              @can('schools.edit')
                <a class="btn btn-sm btn-warning" href="{{ route('schools.edit', $school->id) }}"> Editar </a>
              @endcan
            </td>
            <td width="10px">
              @can('schools.destroy')

                {!! Form::open(['route' => ['schools.destroy', $school->id], 'method' => 'DELETE', 'onclick' => ' return confirm("Estas seguro?")']) !!}
                  <button class="btn btn-sm btn-danger"> Eliminar </button>
                {!! Form::close() !!}

              @endcan
            </td>
           
          </tr> 
          @endforeach
        
        </tbody>
      </table>

    </div>
  </div>
</div>

@stop

@section('scripts')

  <script>
    $(document).ready( function () {
        $('#schoolsTable').DataTable({
            "language":{
                "search": "Buscar",
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
        });
    });
  </script>

@stop
