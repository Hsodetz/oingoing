
@extends('layouts.master')

@section('title', 'Padres')

@section('content')

<div class="container">
  <div class="card card-primary card-outline mt-5">
    <div class="card-header">
      Listado de Padres    
      @can('fathers.create')
        <a href="{{ route('fathers.create') }}" class="badge badge-primary float-right"> Crear <i class="fas fa-plus"></i> </a>  
      @endcan 
    </div>
    <div class="card-body">
     
      <table id="fathersTable" class="table table-striped table-sm table-bordered">
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
   
          @foreach ($fathers as $father)

            @foreach($father->roles as $role) 
          
              @if ($role->name == "Padre") {{--Condicion para que muestre solo los que tienen rol padre --}}        
                <tr>
                  <td> {{ $father->name }} </td>
                  <td> {{ $father->lastname }} </td>
                  <td>
                      {{ $role->name }} 
                  </td>
                  <td width="10px">
                    @can('fathers.show')
                      <a class="btn btn-sm btn-primary" href="{{ route('fathers.show', $father->id) }}"> Ver </a>
                    @endcan
                  </td>
                  <td width="10px">
                    @can('fathers.edit')
                      <a class="btn btn-sm btn-warning" href="{{ route('fathers.edit', $father->id) }}"> Editar </a>
                    @endcan
                  </td>
                  <td width="10px">
                    @can('fathers.destroy')

                      {!! Form::open(['route' => ['fathers.destroy', $father->id], 'method' => 'DELETE', 'onclick' => ' return confirm("Estas seguro?")']) !!}
                        <button class="btn btn-sm btn-danger"> Eliminar </button>
                      {!! Form::close() !!}

                    @endcan
                  </td>
                
                </tr> 
              @endif
            @endforeach
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
        $('#fathersTable').DataTable({
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
