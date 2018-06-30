<div class="form-group">
    {!! Form::label('name', 'Profesor') !!}
    {!! Form::text('name', Auth()->user()->name, ['class' => 'form-control']) !!}
  </div>
  
  <div class="form-group">
    {!! Form::text('user_id', Auth()->user()->id, ['class' => 'form-control', 'hidden' => 'hidden']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('school_id', 'Colegio') !!}
    {!! Form::select('school_id', $schools, ['placeholder', 'Seleccione'], ['class' => 'form-control']) !!}
  </div>
  
  <div class="form-group">
    {!! Form::label('profession', 'Profesion') !!}
    {!! Form::text('profession', null, ['class' => 'form-control']) !!}
  </div>
  
  <div class="form-group">
    {!! Form::label('level_study', 'Nivel de estudio') !!}
    {!! Form::select('level_study', ['Tecnico' => 'Tecnico', 'Tercer Nivel' => 'Tercer Nivel', 'Cuarto Nivel' => 'Cuarto Nivel'], ['placeholder', 'Seleccione'], ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('image', 'Imagen') !!}
    {!! Form::file('image', ['class' => 'form-control btn btn-primary btn-sm', 'required']) !!}
  </div>
