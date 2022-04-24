<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;

class MainController extends Controller {

    public function home() {
        $profile = DB::table('profile')->get(); // подключение к БД
        return view('home', ['profile' => $profile->all()]); // В переменную 'profile' записываются все значения из таблицы и выводятся на главную страницу
    }

    public function about() {
        return view('about');
    }

    public function authorization(Request $request)
    {
        return view('authorization', ['request' => $request['request']]);
    }

    public function authorization_check(Request $request) {
        $is_valid_name = $request->validate([
            'username' => 'required|min:4|max:30',
        ]);

        if ($is_valid_name) {
            $username = $request->input('username');
            $user_exists = DB::table('users')
                ->where('username', $username)
                ->exists();

            if ($user_exists) {
                return Redirect::action([MainController::class, 'home'], ['request' => $username]);
            }
            return Redirect::back()->withErrors(['username' => 'Current user exists']);

        }
    }

}
