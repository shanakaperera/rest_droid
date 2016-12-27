@extends('app')

@section('content')
    <h1>{{Session::get('login_usr')->getName()}}</h1>
@endsection