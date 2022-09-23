@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@if (Auth::guest())
<div class="row">
    <div class="col-md-8 mx-auto">
    <h1 > Добро пожаловать на телефонный справочник!</h1>
        </br>
        Для того чтобы вести свои записи <a href="register">Зарегистрируйтесь</a> или <a href ='login'>Войдите</a>
    </div>
</div>

@else
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1 > Добро пожаловать, {{auth()->user()->name}}</h1>
            </br>
            <button type="button" class="btn btn-primary btn-lg" href="phonebook.my/posts">Справочник</button>
        </div>
    </div>
    @endif

@endsection
