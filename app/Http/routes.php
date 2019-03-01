<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

function getImageContentType($file){
    $mime = exif_imagetype($file);
    
    if ($mime === IMAGETYPE_JPEG) 
        $contentType = 'image/jpeg';

    elseif ($mime === IMAGETYPE_GIF)
        $contentType = 'image/gif';

    else if ($mime === IMAGETYPE_PNG)
        $contentType = 'image/png';

    else
        $contentType = false;

    return $contentType;
}

//testing route

Route::get('testModels','DashboardController@test');

//Menu Routes
//Dashboard
Route::get('', 'DashboardController@index');
Route::get('dashboard', 'DashboardController@index'); //just in case


//Regions etc
Route::get('regions', 'RegionsController@index'); 
Route::get('region/{id}', 'RegionsController@regions'); 
Route::get('subregions/{id}', 'RegionsController@subregions'); 
Route::get('municipalities/{id}', 'RegionsController@municipalities'); 

Route::get('regions/ajax/{year}', 'RegionsController@getRegions'); 
Route::get('subregions/ajax/{year}', 'RegionsController@getSubRegions'); 
Route::get('municipalities/ajax/{year}', 'RegionsController@getMunicipalities'); 

Route::get('regions/export/{year}', 'RegionsController@exportExcel'); 



Route::get('subregions', 'RegionsController@subregions');
Route::get('municipalities', 'RegionsController@municipalities');
Route::get('testRegions', 'RegionsController@testRegions');



//Producers etc
Route::get('producers', 'ProducersController@index');
Route::get('ajax/producers/{year}', 'ProducersController@getProducers');
Route::get('ajax/producersActivity/{year}', 'ProducersController@getMainTable');
Route::get('ajax/producersActivityChart/{year}', 'ProducersController@getMainChart');
Route::get('ajax/producersActivityExport/{year}', 'ProducersController@exportMainTable');


Route::get('ajax/singlestore', 'ProducersController@getSingleStore');
Route::get('ajax/substores', 'ProducersController@getSubStores');
Route::get('ajax/networks', 'ProducersController@getNetworks');

Route::get('producers/singlestore', 'ProducersController@index');
Route::get('producers/network', 'ProducersController@index'); 
Route::get('producers/network/substore', 'ProducersController@index'); 


//Units
Route::get('units', 'UnitsController@index'); 
Route::get('ajax/units/{year}', 'UnitsController@getUnits'); 
Route::get('units/finalunits', 'UnitsController@index'); 
Route::get('ajax/units/{year}', 'UnitsController@getUnits'); 


//Routes
Route::get('routes','RoutesController@index');
Route::get('routes/{id}','RoutesController@show');
Route::get('routes/routes','RoutesController@index');
Route::get('ajax/routes/{year}', 'RoutesController@getRoutes'); 

//Reports
Route::get('reports', 'ReportsController@index'); 
Route::post('reports', 'ReportsController@index'); 





//System Routes
Route::resource('users', 'UsersController'); //List of users
Route::get('users/{id}/editprofile','UsersController@editprofile');
Route::patch('users/{id}/editprofile','UsersController@updateprofile');
Route::get('users/{id}/delete','UsersController@delete');

Route::get('user/avatars/{filename}', function($filename){
    $filePath = storage_path().'/user/avatars/'.$filename;
    if ( ! File::exists($filePath) or ( ! $mimeType = getImageContentType($filePath))){
        return Response::make("File does not exist.", 404);
    }
    $fileContents = File::get($filePath);
    return Response::make($fileContents, 200, array('Content-Type' => $mimeType));
});


// messaging
Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
    Route::delete('{id}', ['as' => 'messages.delete', 'uses' => 'MessagesController@deleteMessage']);
});


Route::group(['prefix' => 'adminmessages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@indexAdmin']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});



//Notifications - it's pretty much the same as messaging

// messaging
Route::group(['prefix' => 'notifications'], function () {
    Route::get('/', ['as' => 'notifications', 'uses' => 'NotificationsController@index']);
    Route::get('create', ['as' => 'notifications.create', 'uses' => 'NotificationsController@create']);
    Route::post('/', ['as' => 'notifications.store', 'uses' => 'NotificationsController@store']);
    Route::get('{id}', ['as' => 'notifications.show', 'uses' => 'NotificationsController@show']);
    Route::put('{id}', ['as' => 'notifications.update', 'uses' => 'NotificationsController@update']);
    Route::delete('{id}', ['as' => 'notifications.delete', 'uses' => 'NotificationsController@deleteMessage']);
});


Route::group(['prefix' => 'adminnotifications'], function () {
    Route::get('/', ['as' => 'notifications', 'uses' => 'NotificationsController@indexAdmin']);
    Route::get('create', ['as' => 'notifications.create', 'uses' => 'NotificationsController@create']);
    Route::post('/', ['as' => 'notifications.store', 'uses' => 'NotificationsController@store']);
    Route::get('{id}', ['as' => 'notifications.show', 'uses' => 'NotificationsController@show']);
    Route::put('{id}', ['as' => 'notifications.update', 'uses' => 'NotificationsController@update']);
});


//monades edit
//Route::group(['prefix' => 'monades'], function () {
//    Route::get('/', ['as' => 'monades', 'uses' => 'MonadesController@index']);
//    Route::get('create', ['as' => 'monades.create', 'uses' => 'MonadesController@create']);
//    Route::post('/', ['as' => 'monades.store', 'uses' => 'MonadesController@store']);
//    Route::get('{id}', ['as' => 'monades.show', 'uses' => 'MonadesController@show']);
//    Route::put('{id}', ['as' => 'monades.update', 'uses' => 'MonadesController@update']);
//    Route::delete('{id}', ['as' => 'monades.delete', 'uses' => 'MonadesController@deleteMessage']);
//});


Route::resource('monades', 'MonadesController');

Route::get('ajax/periferies', 'AjaxController@getPeriferiesTab');
Route::get('ajax/periferiakes-enotites', 'AjaxController@getPeriferiakesEnotTab');
Route::get('ajax/dimoi', 'AjaxController@getDimoi');
Route::get('ajax/drastiriotites', 'AjaxController@getDrastiriotites');
Route::get('ajax/customers','AjaxController@getClientsList');

//mine ====================
Route::get('ajax/regions/{year}','AjaxController@getRegions');
Route::get('ajax/subregions/{year}','AjaxController@getSubRegions');
Route::get('ajax/municipalities/{year}','AjaxController@getMunicipalities');
Route::get('ajax/producersactivity/{year}','AjaxController@getProducersActivity');
Route::get('ajax/producers/{year}','AjaxController@getProducers');

Route::get('ajax/allnetworks/{id}','AjaxController@getAllNetworks');
Route::get('ajax/allsubregions/{id}','AjaxController@getAllSubRegions');
Route::get('ajax/allmunicipalities/{id}','AjaxController@getAllMunicipalities');







//Route::get('users/{id}/roles', 'UsersController@userRole'); //Edit user role
//Route::post('users/{id}/roles', 'UsersController@saveUserRole'); //Save user role
//Route::get('dashboard/year/{year?}', 'DashboardController@index');
//Route::get('dashboard/year/{year}/district/{perifereia?}', 'DashboardController@index');



//Get Data Controller
Route::get('getdata/{action}&{year}', 'GetdataController@index');
Route::get('getdata/mainChart/{year}/{category}/{xAxis?}', 'GetdataController@mainChart');
Route::get('getdata/mainChartData/{year}/{perifereia?}', 'GetdataController@mainChartData');
Route::get('getdata/categoriesSum/{year}','GetdataController@categoriesSum');

Route::get('getdataNew/','GetdataController@getDataNew');



Route::get('/nomothesia', 'ContentController@legal');


Route::get('/apointment', 'ContentController@apointment');

Route::get('/faq', 'ContentController@faq');


// Authentication Routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


// Password Reset Routes...
//Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
//Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
//Route::post('password/reset', 'Auth\PasswordController@reset');

Route::controllers([
	//'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
