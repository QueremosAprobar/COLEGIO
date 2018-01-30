@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="color: white;background-color: #2a88bd;border-color: #2a88bd">Registro Administrador</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            {{--Campo DNI--}}
                            <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">DNI</label>

                                <div class="col-md-6">
                                    <input id="dni" type="text" class="form-control" name="dni" placeholder="Ingrese DNI">

                                    @if ($errors->has('dni'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--Campo Contraseña--}}
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">CONTRASEÑA</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Ingrese Contraseña" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <input id="tipo" type="text" name="tipo" placeholder="tipo" hidden>
                            {{--<input id="dni" type="text" name="dni" placeholder="Ingrese DNI">--}}
                            {{--<input id="password" type="text" name="password" placeholder="password">--}}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
