<?php

use App\Http\Controllers\UserController;
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
    Route::post('registerE','Auth.RegisterController@test')->name('rg');

    
});

Route::get('logout', 'QovexController@logout');
//Route::post('reset-password','UserController@update')->name('password.update');

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
    Route::get('/home', 'HomeController@index')->name('home');
   //Route::get('logout', 'HomeController@logout');
    Route::resource('c-enseignant','compteEnseignantController');

   //redirect to print page of demand
    Route::get('/print', 'compteEnseignantController@print')->name('print2'); 

    Route::post('/insert_mouvement','compteEnseignantController@store2');
   

    Route::get('/test','compteEnseignantController@test');

    //Route::get('/c','compteEnseignantController@c');

    //Route::get('/mv','compteEnseignantController@create');
    // Route::get('/mv2','compteEnseignantController@create2');
    Route::get('/seting','compteEnseignantController@seting')->name('seting');

    Route::post('/update/{id}', 'compteEnseignantController@upd')->name('update');
    //////test wizard///
    //////show formulaire mouvement/////
    Route::get('/demande_de_mouvememnt','compteEnseignantController@create')->name('create');
    Route::get('/demande_de_mouvememnt2','compteEnseignantController@create2')->name('create2');
   ////

   Route::get('/getetab','compteEnseignantController@getetab');
   
    Route::post('/c-enseignant/insertscore', 'compteEnseignantController@insertscore');

    Auth::routes();


});





////////session admin///////////////
Route::group(['middleware' =>['auth', 'admin'] ], function() {
    Route::get('/index', 'QovexController@indexbesoin')->name('index');
    Route::get('{any}', 'QovexController@index');
  //  Route::get('/home', 'QovexController@indexhome')->name('home');
 
///////saisie classe lycee ajax ///////////
Route::get('/lycees/getNiveau', 'LyceeController@getNiveau')->name('getNiveau');
Route::get('/lycees/gettable', 'LyceeController@getTable')->name('gettable'); 

////////////ajac apex charset 
Route::get('/index/stat', 'QovexController@getens')->name('getens');
////////
Route::post('/lycees/insertclasse', 'LyceeController@insertclasse')->name('insertclasse');




Route::get('/colleges/gettablec', 'CollegeController@getTablec')->name('gettablec'); 
//Route::get('/insertclassec', 'CollegeController@insertclassec')->name('insertclassec');

////////////saisie classe pilote lycee ajax ////
Route::get('/piloteslycee/gettablepl', 'PiloteLcController@getTablepl')->name('gettablepl'); 
//Route::post('/insertclassepl', 'PiloteLcController@insertclassepl')->name('insertclassepl');
                           
////////////saisie classe pilote ajax ////
route::get('/pilotes/gettablep', 'PiloteController@getTableP')->name('gettablep'); 

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
Route::get('/etablissements/Besoin_mat_par_mat', 'LyceeController@getmat')->name('Besoin_mat_par_mat');


Route::get('/lycees/Get_data','LyceeController@gettableb');
Route::get('/lycees/Get_data2','LyceeController@gettableb2');
Route::get('/lycees/Get_data3','LyceeController@gettableb3');
Route::get('/lycees/Get_data4','LyceeController@gettableb4');
//////
Route::get('/colleges/edit/{id}', 'CollegeController@edit')->name('editcollege');
Route::post('/colleges/update/{id}', 'CollegeController@update')->name('updatecollege');
Route::get('/lycees/edit_lycee/{id}', 'LyceeController@edit')->name('editlycee');
Route::post('/lycees/update/{id}', 'LyceeController@update')->name('updatelycee');

Route::get('/enseignants/edit_enseignant/{id}', 'EnseignantController@edit')->name('editenseignant');

Route::get('/lycees/saisie_classe_lycee', 'LyceeController@saisie');
Route::get('/colleges/saisie_classe_college', 'CollegeController@saisiec');
Route::get('/piloteslycee/saisie_classe_pilotelc', 'PiloteLcController@saisiepl');
Route::get('/pilotes/saisie_classe_pilote', 'PiloteController@saisiep');

Route::get('/Gestion_Besoin', 'QovexController@indexbesoin')->name('besoin');
//Route::get('logout', 'QovexController@logout');
Route::get('/enseignants/Liste des mouvements', 'EnseignantController@listemouvement')->name('mouvement');



/* Route::get('/home', 'HomeController@home')->name('home');  */

Route::get('/enseignants/index','EnseignantController@indexuser')->name('enseignants.liste_mouvement');
Route::post('/c-enseignant/insertpost','compteEnseignantController@insertpost');
Route::post('/profile/update', 'UserController@update_avatar');

Route::get('profile', 'UserController@profile');

Route::get('/enseignants/updatemv/{id}', 'EnseignantController@etatmv')->name('enseignants.etatmv');
Route::get('/enseignants/updatemv2/{id}', 'EnseignantController@etatmv2')->name('enseignants.etatmv2');

Route::get('/enseignants/download/{id}', 'EnseignantController@downloadPDF')->name('path');
Route::get('/enseignants/downloadm/{id}', 'EnseignantController@downloadPDFm')->name('pathm');
Route::get('/enseignants/downloadmth/{id}', 'EnseignantController@downloadPDFmth')->name('mathmoun');
Route::get('/enseignants/downloadtasrih/{id}', 'EnseignantController@downloadPDFtasrih')->name('tasrih');
Route::get('/enseignants/downloadcopysec/{id}', 'EnseignantController@downloadPDFcopysec')->name('copysec');
Route::get('/enseignants/downloadcopyikama/{id}', 'EnseignantController@downloadPDFcopyikama')->name('copyikama');


Route::get('/enseignants/download2/{id}', 'EnseignantController@downloadPDF2')->name('path2');
Route::get('/enseignants/downloadm2/{id}', 'EnseignantController@downloadPDFm2')->name('pathm2');
Route::get('/enseignants/downloadmth2/{id}', 'EnseignantController@downloadPDFmth2')->name('mathmoun2');
Route::get('/enseignants/downloadtasrih2/{id}', 'EnseignantController@downloadPDFtasrih2')->name('tasrih2');
Route::get('/enseignants/downloadcopysec2/{id}', 'EnseignantController@downloadPDFcopysec2')->name('copysec2');
Route::get('/enseignants/downloadcopyikama2/{id}', 'EnseignantController@downloadPDFcopyikama2')->name('copyikama2');
/*
Route::get('/enseignants/{file_name}', function($path= null)
{
  
    return response()->download(storage_path("app/public/".$path));
})->name('p');*/

Route::get('/enseignants/annulermv/{id}', 'EnseignantController@annulermv')->name('enseignants.annulermv');
Route::get('/enseignants/annulermv2/{id}', 'EnseignantController@annulermv2')->name('enseignants.annulermv2');

Route::delete('/enseignants/deletemv/{id}', 'EnseignantController@deletemv')->name('enseignants.deletemv');

Route::delete('/enseignants/deletemv2/{id}', 'EnseignantController@deletemv2')->name('enseignants.deletemv2');
//Route::delete('/colleges/deletecollege/{id}', 'CollegeController@destroy')->name('college.destroy');
Auth::routes();

});

Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
