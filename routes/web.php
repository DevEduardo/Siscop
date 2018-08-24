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

Route::view('/', 'auth.login');

Auth::routes();

Route::view('/perfil', 'auth.profile');
Route::post('modificar/contraseña/{id}', 'Auth\UserController@updatePassword')->name('password');
Route::post('modificar/datos/{id}', 'Auth\UserController@update')->name('data');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('estudios', 'StudyController');
Route::post('/estudios/{id}', 'StudyController@update');

Route::resource('personas', 'PersonController');
Route::post('/buscar/persona', 'PersonController@show');
Route::post('/personas/{id}', 'PersonController@update');
Route::view('/search', 'person.search');
Route::post('/search/persona', 'PersonController@search');

Route::resource('familiares', 'FamilyController');
Route::get('buscar/empleado', 'FamilyController@getPerson');
Route::post('familiares/create', 'FamilyController@create');
Route::get('/getDataFamily/{id}', 'FamilyController@getDataFamily');
Route::get('/familiar/delete/{id}', 'FamilyController@destroy');

Route::resource('direccion', 'AddressController');
Route::post('/direccion/{id}', 'AddressController@update');

Route::get('city/{id}','AddressController@getCity');
Route::get('municipality/{id}','AddressController@getMunicipality');
Route::get('parish/{id}','AddressController@getParish');

Route::resource('formacion', 'TrainingController');
Route::post('formacion/update', 'TrainingController@updateTraining');
Route::get('getDataTraining/{id}', 'TrainingController@getDataTraining');
Route::get('/formacion/delete/{id}', 'TrainingController@destroy');

Route::resource('historial_medico', 'MedicalHistoryController');

Route::resource('nomina', 'PayrollController');
Route::get('payroll/code/{type}', 'PayrollController@code');

Route::resource('dependencias', 'DependenceController');
Route::resource('departamentos', 'DepartamentController');
Route::resource('cargos', 'PositionController');

Route::get('tabulador', 'SettingController@getTabulador');
Route::post('tabulador', 'SettingController@postTabulador');
Route::get('getSalary/{grade}', 'SettingController@getSalary');


Route::view('plan/vacacional', 'vacationPlan.settings');
Route::post('plan/vacacional', 'VacationPlanController@settings');
Route::get('inscripcion/plan', 'VacationPlanController@search');


