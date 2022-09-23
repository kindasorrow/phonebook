@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Показ записи</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Назад </a>
            </div>
        </div>
    </div>

    <div class="container py-2">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Имя:</strong>
                {{ $post->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $post->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Телефон:</strong>
                {{ $post->phone }}
            </div>
        </div>
    </div>
@endsection
