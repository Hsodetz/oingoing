@extends('layouts.master')

@section('content')
<div class="container">
   
<div class="card card-default mt-5">
    <div class="card-header">Registro de Usuarios</div>

    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Nombres</label>

                        <div class="col">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                        <label for="lastname" class="control-label">Apellidos</label>

                        <div class="col">
                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>

                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="lastname" class="control-label">Nombre de Usuario</label>

                        <div class="col">
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                        <label for="age" class="control-label">Edad</label>

                        <div class="col">
                            <input id="age" type="number" class="form-control" name="age" value="{{ old('age') }}" required>

                            @if ($errors->has('age'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('age') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail</label>
        
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>
        
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" required>
        
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="password-confirm" class="col-md-12 control-label">Confirmar Password</label>
        
                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="identification_document">Documento de Identificacion</label>
                        <input type="text" name="identification_document" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('province_id', 'Provincia') !!}
                        {!! Form::select('province_id', $provincias, null, ['id' => 'province', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('city_id', 'Ciudad') !!}
                        {!! Form::select('city_id', ['placeholder' => 'Seleccione'], null, ['id' => 'city', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address"> Direccion de Habitacion </label>
                        <textarea name="address" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone_mobile"> Telefono Movil </label>
                        <input type="tel" name="phone_mobile" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone_house"> Telefono Domicilio </label>
                        <input type="tel" name="phone_house" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nationality"> Nacionalidad </label>
                        <input type="text" name="nationality" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="occupation"> Ocupacion </label>
                        <input type="text" name="occupation" class="form-control">
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sex"> Sexo </label>
                        <br>
                        <label>
                            <input type="radio" name="sex" value="MALE"> Masculino
                        </label>
                        <label>
                            <input type="radio" name="sex" value="FEMALE"> Femenino
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="civil_status"> Estado Civil </label>
                        <br>
                        <label>
                            <input type="radio" name="civil_status" value="single"> Soltero
                        </label>
                        <label>
                            <input type="radio" name="civil_status" value="married"> Casado
                        </label>
                        <label>
                            <input type="radio" name="civil_status" value="divorced"> Divorciado
                        </label>
                    </div>
                </div>
            </div>
            <hr>

            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary float-right">
                        Registrar
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
    
</div>
@endsection

@section('scripts')
    <script>
        // Script para el select dependiente de provincias y ciudades.
        $(document).ready(function(){
            $("#province").change(event => {
                $.get(`cities/${event.target.value}`, function(res, sta){
                    $("#city").empty();
                    res.forEach(element => {
                    $("#city").append(`<option value=${element.id}> ${element.name} </option>`);
                    });
                });    
            });  
        });
        
    </script> 
@stop

