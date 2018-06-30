{{-- Decisiones para colocar la foto del usuaio logueado --}}

@role('Padre')
  @if($father == "")
    <img src="{{ asset('/imagenes/avatar.png') }}" class="elevation-2" alt="User Image">
    <span class="badge badge-light ml-3"> {{ Auth::user()->name }} </span>
  @else
    <img src="../imagenes/padres/{{ $father->image }}" class="img-rounded elevation-2">
    <span class="badge badge-light ml-3"> {{ Auth::user()->name }} </span>
  @endif
@endrole

@role('Profesor')
  @if($teacher == "")
    <img src="{{ asset('/imagenes/avatar.png') }}" class="elevation-2" alt="User Image">
    <span class="badge badge-light ml-3"> {{ Auth::user()->name }} </span>
  @else
    <img src="../imagenes/profesores/{{ $teacher->image }}" class="img-rounded elevation-2">
    <span class="badge badge-light ml-3"> {{ Auth::user()->name }} </span>
  @endif
@endrole

@role('')
  <img src="{{ asset('/imagenes/avatar.png') }}" class="elevation-2" alt="User Image">
  <span class="badge badge-light ml-3"> {{ Auth::user()->name }} </span>
@endrole