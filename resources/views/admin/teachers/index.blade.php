
@extends('layouts.master')

@section('title', 'Profesores')

@section('content')

<div class="container">
  <div class="card card-primary card-outline mt-5">
    <div class="card-header">
      Listado de Profesores    
      @can('teachers.create')
        <a href="{{ route('teachers.create') }}" class="badge badge-primary float-right"> Crear <i class="fas fa-plus"></i> </a>  
      @endcan 
    </div>
    <div class="card-body">
     
      <table id="teachersTable" class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Rol</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
   
          @foreach ($teachers as $teacher)

            @foreach($teacher->role as $role) 
            
            @endforeach

            @if ($role->name == "Profesor") {{--Condicion para que muestre solo los que tienen rol padre --}}        
              <tr>
                <td> {{ $teacher->name }} </td>
                <td> {{ $teacher->last_name }} </td>
                <td>
                    {{ $role->name }} 
                </td>
                <td width="10px">
                  @can('teachers.show')
                    <a class="btn btn-sm btn-primary" href="{{ route('teachers.show', $teacher->id) }}"> Ver </a>
                  @endcan
                </td>
                <td width="10px">
                  @can('teachers.edit')
                    <a class="btn btn-sm btn-warning" href="{{ route('teachers.edit', $teacher->id) }}"> Editar </a>
                  @endcan
                </td>
                <td width="10px">
                  @can('teachers.destroy')

                    {!! Form::open(['route' => ['teachers.destroy', $teacher->id], 'method' => 'DELETE', 'onclick' => ' return confirm("Estas seguro?")']) !!}
                      <button class="btn btn-sm btn-danger"> Eliminar </button>
                    {!! Form::close() !!}

                  @endcan
                </td>
              
              </tr> 
            @endif
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
        $('#teachersTable').DataTable({
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
