
@role('Estudiante')
  <div class="form-group">
    {!! Form::label('name', 'Estudiante') !!}
    {!! Form::text('name', Auth()->user()->name, ['class' => 'form-control']) !!}
  </div>
  
  <div class="form-group">
    {!! Form::text('user_id', Auth()->user()->id, ['class' => 'form-control', 'hidden' => 'hidden']) !!}
  </div>
@endrole
  
@role('Waynakay')
  <div class="form-group">
    {!! Form::label('name', 'Estudiante') !!}
    {!! Form::text('name', $student->name, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::text('user_id', $student->id, ['class' => 'form-control', 'hidden' => 'hidden']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('school_id', 'Colegio') !!}
    {!! Form::select('school_id', $schools, ['placeholder' => 'seleccione'], ['class' => 'form-control', 'required']) !!}
  </div>
  
  <div class="form-group">
    {!! Form::label('father_user_id', 'Padre') !!}
    {!! Form::select('father_user_id', $users, ['placeholder' => 'seleccione'], ['class' => 'form-control', 'required']) !!}
  </div>
@endrole

<div class="form-group">
  {!! Form::label('registration_number', 'Numero de registro') !!}
  {!! Form::text('registration_number', null, ['class' => 'form-control', 'required']) !!}
</div>
  
<div class="form-group">
  {!! Form::label('image', 'Imagen') !!}
  {!! Form::file('image', ['class' => 'form-control', 'required']) !!}
</div>



