
@extends('layouts.master')

@section('title', 'Profesores')

@section('content')

<div class="container">
  <div class="card card-primary card-outline mt-5">
    <div class="card-header">
      Listado de Estudiantes    
      @can('students.create')
        <a href="{{ route('students.create') }}" class="badge badge-primary float-right"> Crear <i class="fas fa-plus"></i> </a>  
      @endcan 
    </div>
    <div class="card-body">
     
      <table id="studentsTable" class="table table-striped table-sm table-bordered">
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
   
          @foreach ($students as $student)

            @foreach($student->roles as $role) 
          
            @if ($role->name == "Estudiante") {{--Condicion para que muestre solo los que tienen rol padre --}}        
              <tr>
                <td> {{ $student->name }} </td>
                <td> {{ $student->lastname }} </td>
                <td>
                    {{ $role->name }} 
                </td>
                <td width="10px">
                  @can('students.show')
                    <a class="btn btn-sm btn-primary" href="{{ route('students.show', $student->id) }}"> Ver </a>
                  @endcan
                </td>
                <td width="10px">
                  @can('students.edit')
                    <a class="btn btn-sm btn-warning" href="{{ route('students.edit', $student->id) }}"> Editar </a>
                  @endcan
                </td>
                <td width="10px">
                  @can('students.destroy')

                    {!! Form::open(['route' => ['students.destroy', $student->id], 'method' => 'DELETE', 'onclick' => ' return confirm("Estas seguro?")']) !!}
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
        $('#studentsTable').DataTable({
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
