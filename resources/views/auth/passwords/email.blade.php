@extends('layouts.login')

@section('content')
    {!!Form::open(['route'=>'password.email','class'=>'login-form'])!!}
        <h3 class="login-head text-primary"><i class="fa fa-3x fa-envelope"></i></h3>
        {!!Field::email('email',['label'=>'Correo electronico'])!!}
        <button class="btn btn-block btn-primary">Enviar correo</button>
        <a href="{{url()->previous()}}" class="btn btn-block btn-danger text-white">Regresar</a>
    {!!Form::close()!!}
@endsection
