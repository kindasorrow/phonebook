@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Создать новую запись</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Назад</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Имя:</strong>
                    <input type="name" name="name" class="form-control" placeholder="Андрей">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="abcd@mail.ru">
{{--                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>--}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Телефон:</strong>
                    <input type="phone" name="phone" class="form-control" placeholder="+7(999) 9999999">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center py-2">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </div>
    </form>
@endsection
