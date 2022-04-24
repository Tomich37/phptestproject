<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
        $is_valid_name = $request->validate([
            'username' => 'required|min:4|max30',
        ]);

        if ($is_valid_name) {
            $username = $request->input('username');
            $user_exists = DB::table('users')
                ->where('username', $username)
                ->exists();

            if (!$user_exists) {
                return view('home', ['request' => $username]);
            }
            return Redirect::back()->withErrors(['username' => 'Current user exists']);
        }
    }

    public function review() {
        return view('review');
    }

    public function review_check(Request $request) {
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:15|max:500'
        ]);

        $review = new Contact();
        $review->email = $request->input('email');
        $review->subject = $request->input('subject');
        $review->message = $request->input('message');

        $review->save();

        return redirect()->route('/review');
    }
}
