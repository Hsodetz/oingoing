
<div class="form-group">
  {!! Form::label('name', 'Padre') !!}
  {!! Form::text('name', Auth()->user()->name, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::text('user_id', Auth()->user()->id, ['class' => 'form-control', 'hidden' => 'hidden']) !!}
</div>

<div class="form-group">
  {!! Form::label('school_id', 'Colegio') !!}
  {!! Form::select('school_id', $schools, ['placeholder' => 'seleccione'], ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
  {!! Form::label('work_address', 'Direccion de Trabajo') !!}
  {!! Form::textarea('work_address', null, ['class' => 'form-control', 'rows' => '2', 'required']) !!}
</div>

<div class="form-group">
  {!! Form::label('work_phone', 'Telefono de Trabajo') !!}
  {!! Form::text('work_phone', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
  {!! Form::label('image', 'Imagen') !!}
  {!! Form::file('image', ['class' => 'form-control', 'required']) !!}
</div>

  