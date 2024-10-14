@extends('master')

@section('content')

<h2>adicionar</h2>

@if (session()->has('message'))
    {{session()->get('message')}}
@endif

<form action="{{ route('users.store')}}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Seu nome">
    <input type="text" name="email" placeholder="Seu email">

    <input type="password" name="password" placeholder="Sua senha">
    <button type="submit">Adicionar</button>
</form>

@endsection

