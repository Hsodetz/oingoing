<div class="form-group">

{!! Form::label('name', 'Nombre') !!}

{!! Form::text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

{!! Form::label('address', 'Direccion') !!}

{!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => '2']) !!}

</div>

<div class="form-group">

{!! Form::label('city_id', 'Ciudad') !!}

{!! Form::select('city_id', $cities, null, ['class' => 'form-control']) !!}

</div>


