@extends('layout')

@section('title') Авторизация @endsection

@section('main_content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <h1>Ошибка!</h1>
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/review/check" method="POST">
        @csrf
        <p>Имя пользователя <input type="text" name="username" id="username" placeholder="Имя пользователя" class="form-control"></p>
        <input type="submit" value="Войти" class="btn btn-success">
    </form>
@endsection
