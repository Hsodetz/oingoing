<div class="form-group">

{!! Form::label('name', 'Nombre') !!}

{!! Form::text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

{!! Form::label('slug', 'Slug') !!}

{!! Form::text('slug', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

{!! Form::label('description', 'Descripcion') !!}

{!! Form::text('description', null, ['class' => 'form-control']) !!}

</div>

<hr>
<div class="form-group">
<h3> Permiso especial </h3>

<br>
<label>
  {!! Form::radio('special', 'all-access', ['class' => 'form-control']) !!} <span class="badge badge-danger"> Acceso Total </span>
</label>
<label>
  {!! Form::radio('special', 'no-access', ['class' => 'form-control']) !!} <span class="badge badge-warning">Ningun Acceso</span>
</label>
<label>
  {!! Form::radio('special', '', ['class' => 'form-control']) !!} <span class="badge badge-success">Acceso Parcial</span>
</label>
</div>
<hr>

<div class="form-control">
  <h3>Lista de Permisos</h3>
  @foreach ($permissions as $permission)
    <div class="form-control">
      <label>
        {!! Form::checkbox('permissions[]', $permission->id, null) !!}
        {{ $permission->name }}
        <em> {{ $permission->description ?: "Sin descripcion" }} </em>
      </label>
    </div>   
  @endforeach
</div>

<br>
<div class="form-group">
  
  {!! Form::button('Guardar &nbsp; <i class="far fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right']) !!}
  <a href="{{ URL::previous() }}" class="badge badge-primary"> <i class="fa fa-arrow-left"></i> Regresar </a>
  
</div>