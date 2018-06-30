
<div class="form-group">
    {!! Form::label('name', 'Estudiante') !!}
    {!! Form::text('name', Auth()->user()->name, ['class' => 'form-control']) !!}
  </div>
  
  <div class="form-group">
    {!! Form::text('user_id', Auth()->user()->id, ['class' => 'form-control', 'hidden' => 'hidden']) !!}
  </div>
  
  <div class="form-group">
    {!! Form::label('school_id', 'Colegio') !!}
    {!! Form::select('school_id', $schools, ['placeholder' => 'seleccione'], ['class' => 'form-control', 'required']) !!}
  </div>
    
  
  {{$role_users}}
  

  <div class="form-group">
    {!! Form::label('user_id', 'Padre') !!}
    <select name="user_id" class="form-control">
      <option>Seleccione</option> 
      @foreach ($users as $user)
        <option value=""> {{ $user->username }} </option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    {!! Form::label('registration_number', 'Numero de registro') !!}
    {!! Form::text('registration_number', null, ['class' => 'form-control', 'required']) !!}
  </div>
  
  <div class="form-group">
    {!! Form::label('image', 'Imagen') !!}
    {!! Form::file('image', ['class' => 'form-control', 'required']) !!}
  </div>



