@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Изменить запись</h2>
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

    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf

        @method('PUT')
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Имя:</strong>
                    <input type="text" name="name" value="{{ $post->name }}" class="form-control" placeholder="name">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $post->email }}" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Телефон:</strong>
                    <input type="text" name="phone" value="{{ $post->phone }}" class="form-control" placeholder="name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center py-2">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </div>
    </form>
@endsection
