@extends('layout')

@section('title') Отзывы @endsection

@section('main_content')
    <h1>Форма добавления отзыва</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/review/check">
        @csrf
        <input type="email" name="email" id="email" placeholder="Введите email" class="form-control">
        <input type="text" name="subject" id="subject" placeholder="Введите отзыв" class="form-control">
        <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение"></textarea><br>
        <buttton type="submit" class="byn btn-success">Отправить</buttton>
    </form>
@endsection
