@extends('layouts.login')

@section('content')
    {!!Form::open(['route'=>'login','class'=>'login-form'])!!}
        <h3 class="login-head text-primary">Iniciar sesion</h3>
        {!!Field::email('email',['label'=>'Usuario'])!!}
        {!!Field::password('password',['label'=>'Contraseña'])!!}
        <button class="btn btn-block btn-primary">Ingresar</button>
        <a href="{{route('password.request')}}">Olvido su contraseña?</a>
    {!!Form::close()!!}
@endsection
