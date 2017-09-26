<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function (){

    $query = http_build_query([
      'client_id' => '3',
      'redirect_uri' => 'http://localhost:9999/callback',
      'response_type' => 'code',
      'scope' => ''
   ]);

   return redirect("http://localhost:8000/oauth/authorize?$query");

});

Route::get('callback', function (\Illuminate\Http\Request $request){

    $code = $request->get('code');
    $http = new \GuzzleHttp\Client();

    $reponse =$http->post('http://localhost:8000/oauth/token', [
        'form_params' => [
            'client_id' => '3',
            'client_secret' => 'w3ex7kEM7MzsuQuAY1mzYpjhSvkuDMLDnsIwnV7h',
            'redirect_uri' => 'http://localhost:9999/callback',
            'code' => $code,
            'grant_type' => 'authorization_code'
        ]
    ]);

    dd(json_decode($reponse->getBody(), true));
});
