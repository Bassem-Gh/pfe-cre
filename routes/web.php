<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    //return redirect('/index');
    return redirect('/login');
});

Auth::routes();
Route::get('logout', 'QovexController@logout');

//Route::get('pages-login', 'QovexController@index');
//Route::get('pages-login-2', 'QovexController@index');
Route::get('pages-register', 'QovexController@index');
//Route::get('pages-register-2', 'QovexController@index');
//Route::get('pages-recoverpw', 'QovexController@index');
//Route::get('pages-recoverpw-2', 'QovexController@index');
//Route::get('pages-lock-screen', 'QovexController@index');
//Route::get('pages-lock-screen-2', 'QovexController@index');
Route::get('pages-404', 'QovexController@index');
Route::get('pages-500', 'QovexController@index');
//Route::get('pages-maintenance', 'QovexController@index');
//Route::get('pages-comingsoon', 'QovexController@index');
//Route::post('login-status', 'QovexController@checkStatus');
//Route::get('login', 'QovexController@logout');


//Route::post('/login', 'QovexController@logout')->name('logout');
// You can also use auth middleware to prevent unauthenticated users
/*Route::group(['middleware' => 'auth'], function () {
   // Route::get('/home', 'QovexController@indexhome')->name('home');
   Route::get('/index', 'QovexController@indexbesoin')->name('index');
    Route::get('{any}', 'QovexController@index');
});*/


//Route::get('/index', 'QovexController@indexbesoin')->name('index');
//Route::get('{any}', 'HomecontrollerController@index');


Route::group(['middleware' => 'auth'], function() {
   Route::get('/home', 'HomeController@index');
   //Route::get('logout', 'HomeController@logout');
   Route::get('/demande_de_mouvememnt','compteEnseignantController@create');
});

////////session admin///////////////
Route::group(['middleware' =>['auth', 'admin'] ], function() {
    Route::get('/index', 'QovexController@indexbesoin')->name('index');
    Route::get('{any}', 'QovexController@index');
  //  Route::get('/home', 'QovexController@indexhome')->name('home');
 
///////saisie classe lycee ajax ///////////
Route::get('/lycees/getNiveau', 'LyceeController@getNiveau')->name('getNiveau');
Route::get('/lycees/gettable', 'LyceeController@getTable')->name('gettable'); 

Route::post('/lycees/insertclasse', 'LyceeController@insertclasse')->name('insertclasse');




Route::get('/colleges/gettablec', 'CollegeController@getTablec')->name('gettablec'); 
//Route::get('/insertclassec', 'CollegeController@insertclassec')->name('insertclassec');

////////////saisie classe pilote lycee ajax ////
Route::get('/piloteslycee/gettablepl', 'PiloteLcController@getTablepl')->name('gettablepl'); 
//Route::post('/insertclassepl', 'PiloteLcController@insertclassepl')->name('insertclassepl');
                           
////////////saisie classe pilote ajax ////
route::get('/pilotes/gettablep', 'PiloteController@getTablep')->name('gettablep'); 

Route::resource('/lycees/lycees','LyceeController');
Route::resource('/pilotes/pilotes','PiloteController');
Route::resource('/piloteslycee/piloteslycee','PiloteLcController'); 

///teachers
Route::get('/enseignants/create_enseignant', 'EnseignantController@create')->name('create_enseignant');
Route::resource('/enseignants/enseignants','EnseignantController'); 

Route::resource('/colleges/colleges','CollegeController');
Route::get('/colleges/create_college', 'CollegeController@create')->name('create_college');
Route::get('/pilotes/create_pilote', 'PiloteController@create')->name('create_pilote');
Route::get('/piloteslycee/create_pilote_lycee', 'PiloteLcController@create')->name('create_pilote_lycee');
Route::get('/lycees/create_lycee', 'LyceeController@create')->name('create_lycee');
Route::delete('/colleges/deletecollege/{id}', 'CollegeController@destroy')->name('college.destroy');

/////besoin par etab ////
Route::get('/etablissements/Besoin_mat_par_etab', 'LyceeController@indexbetab')->name('Besoin_mat_par_etab');

Route::get('/lycees/Get_data','LyceeController@gettableb');
Route::get('/lycees/Get_data2','LyceeController@gettableb2');

//////
Route::get('/colleges/edit/{id}', 'CollegeController@edit')->name('editcollege');
Route::post('/colleges/update/{id}', 'CollegeController@update')->name('updatecollege');
Route::get('/lycees/edit_lycee/{id}', 'LyceeController@edit')->name('editlycee');

 
Route::get('/lycees/saisie_classe_lycee', 'LyceeController@saisie');
Route::get('/colleges/saisie_classe_college', 'CollegeController@saisiec');
Route::get('/piloteslycee/saisie_classe_pilotelc', 'PiloteLcController@saisiepl');
Route::get('/pilotes/saisie_classe_pilote', 'PiloteController@saisiep');

Route::get('/Gestion_Besoin', 'QovexController@indexbesoin')->name('besoin');
//Route::get('logout', 'QovexController@logout');

});

