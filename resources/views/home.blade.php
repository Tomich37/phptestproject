@extends('layout')

@section('title')
    Главная страница
@endsection

@section('main_content')

    <h4>Добавить предметы для пользователя " . $request . "</h4>";
    <br>

    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <script src="/js/trashcan_tables.js">'let left;'</script>

    <div id="container">
        <div id="left" class='green_container'></div>
        <div class="center_div"></div>
        <div id="right" class='green_container'></div>
    </div>

    @php
        {{
            function addElementIntoLeft($name, &$array)
            {
                return '<script type="text/javascript">' .
                    'left = document.getElementById("left");' .
                    'left.innerHTML += get_element_html_code(' .
                    '"' . $name . '"' .
                    ', ' .
                    json_encode($array, JSON_UNESCAPED_UNICODE) .
                    ');' .
                    '</script>';
            }
            $directions = DB::table('directions')->get();

            foreach ($directions as $direction) {
                $username = $direction->direction_code . ', ' . $direction->direction_title;
                $profiles = DB::table('profile')->where('direction_code', '=', $direction->direction_code)->get();
                $profiles_array = [];
                foreach ($profiles as $profile) {
                    $profiles_array[] = $profile->profile_title;
                }
                echo addElementIntoLeft($username, $profiles_array) . '<br>';
            }
        }}
    @endphp

@endsection
