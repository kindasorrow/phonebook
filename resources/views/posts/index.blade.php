@extends('layouts.app')
@section('content')


{{--    @if (session('status'))--}}
{{--        <div class="alert alert-success" role="alert">--}}
{{--            {{ session('status') }}--}}
{{--        </div>--}}
{{--    @endif--}}

    <div class="container py-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Телефонный справочник </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('posts.create') }}"> Создать новую запись</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table container">
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Электронная почта</th>
            <th>Телефон</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->email}}</td>
                <td>{{$post->phone}}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('posts.show',$post->id) }}">Показать</a>
                    <a class="btn btn-secondary" href="{{ route('posts.edit',$post->id) }}">Изменить</a>
                    <form action="{{ route('posts.destroy',$post->id) }}" style=" display: inline;" method="POST">

                        @csrf
                        @method('DELETE')
                        <button  onclick="return confirm('Вы уверены?');" type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
