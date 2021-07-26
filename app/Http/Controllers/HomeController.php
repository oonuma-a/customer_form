<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HomeRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     /*
     * バリデーションメッセージの表示
     */
    
    public function index(){
        /*
        * 都道府県の配列を登録する。
        */
        $prefectures = [
            '北海道',
             '青森県',
             '岩手県',
             '宮城県',
             '秋田県',
             '山形県',
             '福島県',
             '茨城県',
             '栃木県',
             '群馬県',
             '埼玉県',
             '千葉県',
             '東京都',
             '神奈川県',
             '新潟県',
             '富山県',
             '石川県',
             '福井県',
             '山梨県',
             '長野県',
             '岐阜県',
             '静岡県',
             '愛知県',
             '三重県',
             '滋賀県',
             '京都府',
             '大阪府',
             '兵庫県',
             '奈良県',
             '和歌山県',
             '鳥取県',
             '島根県',
             '岡山県',
             '広島県',
             '山口県',
             '徳島県',
             '香川県',
             '愛媛県',
             '高知県',
             '福岡県',
             '佐賀県',
             '長崎県',
             '熊本県',
             '大分県',
             '宮崎県',
             '鹿児島県',
             '沖縄県'
        ];
        
        return view('/form/index', compact('prefectures'));
    }

    public function conf(HomeRequest $request){
        /*
        * フォームデータを受け取る
        */
        $form_data = [
            'name_sei' => $request -> name_sei ?? $request->old('name_sei'),
            'name_mei' => $request ->  name_mei ?? $request->old('name_mei'),
            'name_sei_kana' => $request ->  name_sei_kana ?? $request->old('name_sei_kana'),
            'name_mei_kana' => $request ->  name_mei_kana ?? $request->old('name_mei_kana'),
            'birthday_y' => $request ->  birthday_y ?? $request->old('birthday_y'),
            'birthday_m' => $request ->  birthday_m ?? $request->old('birthday_m'),
            'birthday_d' => $request ->  birthday_d ?? $request->old('birthday_d'),
            'tel1' => $request ->  tel1 ?? $request->old('tel1'),
            'tel2' => $request ->  tel2 ?? $request->old('tel2'),
            'tel3' => $request ->  tel3 ?? $request->old('tel3'),
            'email' => $request ->  email ?? $request->old('email'),
            'zip1' => $request ->  zip1 ?? $request->old('zip1'),
            'zip2' => $request ->  zip2 ?? $request->old('zip2'),
            'adr1' => $request ->  adr1 ?? $request->old('adr1'),
            'adr2' => $request ->  adr2 ?? $request->old('adr2'),
            'adr3' => $request ->  adr3 ?? $request->old('adr3'),
            'adr4' => $request ->  adr4 ?? $request->old('adr4'),
        ];
        return view('/form/conf', compact('form_data'));
    }
    public function password(Request $request){
        /*
        * フォームデータを受け取る
        */
        $form_data = [
            'name_sei' => $request -> name_sei ?? $request->old('name_sei'),
            'name_mei' => $request ->  name_mei ?? $request->old('name_mei'),
            'name_sei_kana' => $request ->  name_sei_kana ?? $request->old('name_sei_kana'),
            'name_mei_kana' => $request ->  name_mei_kana ?? $request->old('name_mei_kana'),
            'birthday_y' => $request ->  birthday_y ?? $request->old('birthday_y'),
            'birthday_m' => $request ->  birthday_m ?? $request->old('birthday_m'),
            'birthday_d' => $request ->  birthday_d ?? $request->old('birthday_d'),
            'tel1' => $request ->  tel1 ?? $request->old('tel1'),
            'tel2' => $request ->  tel2 ?? $request->old('tel2'),
            'tel3' => $request ->  tel3 ?? $request->old('tel3'),
            'email' => $request ->  email ?? $request->old('email'),
            'zip1' => $request ->  zip1 ?? $request->old('zip1'),
            'zip2' => $request ->  zip2 ?? $request->old('zip2'),
            'adr1' => $request ->  adr1 ?? $request->old('adr1'),
            'adr2' => $request ->  adr2 ?? $request->old('adr2'),
            'adr3' => $request ->  adr3 ?? $request->old('adr3'),
            'adr4' => $request ->  adr4 ?? $request->old('adr4'),
        ];
        return view('/form/password', compact('form_data'));
    }
    public function complete_post(PasswordRequest $request){
        /*
        * フォームデータを受け取る
        */
        $form_data = [
            'name_sei' => $request -> name_sei ?? $request->old('name_sei'),
            'name_mei' => $request ->  name_mei ?? $request->old('name_mei'),
            'name_sei_kana' => $request ->  name_sei_kana ?? $request->old('name_sei_kana'),
            'name_mei_kana' => $request ->  name_mei_kana ?? $request->old('name_mei_kana'),
            'birthday_y' => $request ->  birthday_y ?? $request->old('birthday_y'),
            'birthday_m' => $request ->  birthday_m ?? $request->old('birthday_m'),
            'birthday_d' => $request ->  birthday_d ?? $request->old('birthday_d'),
            'tel1' => $request ->  tel1 ?? $request->old('tel1'),
            'tel2' => $request ->  tel2 ?? $request->old('tel2'),
            'tel3' => $request ->  tel3 ?? $request->old('tel3'),
            'email' => $request ->  email ?? $request->old('email'),
            'zip1' => $request ->  zip1 ?? $request->old('zip1'),
            'zip2' => $request ->  zip2 ?? $request->old('zip2'),
            'adr1' => $request ->  adr1 ?? $request->old('adr1'),
            'adr2' => $request ->  adr2 ?? $request->old('adr2'),
            'adr3' => $request ->  adr3 ?? $request->old('adr3'),
            'adr4' => $request ->  adr4 ?? $request->old('adr4'),
            'password' => $request ->  password ?? $request->old('password'),
            'password_confirmation' => $request ->  password_confirmation ?? $request->old('password_confirmation'),
        ];
        $db_send = [
            'name_sei' => $request -> name_sei ?? $request->old('name_sei'),
            'name_mei' => $request ->  name_mei ?? $request->old('name_mei'),
            'name_sei_kana' => $request ->  name_sei_kana ?? $request->old('name_sei_kana'),
            'name_mei_kana' => $request ->  name_mei_kana ?? $request->old('name_mei_kana'),
            'birthday_y' => $request ->  birthday_y ?? $request->old('birthday_y'),
            'birthday_m' => $request ->  birthday_m ?? $request->old('birthday_m'),
            'birthday_d' => $request ->  birthday_d ?? $request->old('birthday_d'),
            'tel1' => $request ->  tel1 ?? $request->old('tel1'),
            'tel2' => $request ->  tel2 ?? $request->old('tel2'),
            'tel3' => $request ->  tel3 ?? $request->old('tel3'),
            'email' => $request ->  email ?? $request->old('email'),
            'zip1' => $request ->  zip1 ?? $request->old('zip1'),
            'zip2' => $request ->  zip2 ?? $request->old('zip2'),
            'adr1' => $request ->  adr1 ?? $request->old('adr1'),
            'adr2' => $request ->  adr2 ?? $request->old('adr2'),
            'adr3' => $request ->  adr3 ?? $request->old('adr3'),
            'adr4' => $request ->  adr4 ?? $request->old('adr4'),
            'password' => $request ->  password ?? $request->old('password')
        ];

        #DB::insert('insert into database(name_sei,name_mei, name_sei_kana, name_mei_kana, birthday_y, birthday_m, birthday_d, tel1, tel2, tel3, email, zip1, zip2, adr1, adr2, adr3, adr4, password) values(:name_sei,:name_mei, :name_sei_kana, :name_mei_kana, :birthday_y, :birthday_m, :birthday_d, :tel1, :tel2, :tel3, :email, :zip1, :zip2, :adr1, :adr2, :adr3, :adr4, :password)',$db_send);

        $contact = $request->all();
        Mail::to(//'@mail', 
        //メールアドレスを入力
    	)
        ->send(new RegisterMail($contact));

        return view('/form/complete', compact('db_send'));

        
    }
    


}