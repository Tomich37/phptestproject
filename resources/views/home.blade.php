@extends('layout')

@section('title') Главная страница @endsection

@section('main_content')
    <h1>Все отзывы</h1>
{{--    {{ dd($direction_code) }}--}}
    @foreach($profile as $dc) {{--        из переменной, полученной с контроллера, перебираются все элементы массива--}}
        <div class="alert alert-warning">
            <h3>{{ $dc->direction_code }}</h3>  {{--            Достаются все значения из столбца direction_code--}}
        </div>
        @foreach($profile as $pt)
            <h2>{{$pt->profile_title}}</h2>
        @endforeach
    @endforeach


@endsection
