<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MainController extends Controller {

    public function home() {
        $profile = DB::table('profile')->get(); // подключение к БД
        return view('home', ['profile' => $profile->all()]); // В переменную 'profile' записываются все значения из таблицы и выводятся на главную страницу










        //return view('home');
//        $profile_title= DB::table('profile');
//        $direction_code = DB::table('profile')->where('direction_code', 80200);
//        dd($direction_code);
//        dd(view('home', $direction_code)); //На страницу Home
//        return view('home', ['$profile_title' => $profile_title->get()]);
        //dd(view('home', ['contacts' => $contacts]));
    }

    public function about() {
        return view('about');
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
