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

Route::any('captcha-test', function()
{
    if (Request::getMethod() == 'POST')
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        }
        else
        {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }
    }

    $form = '<form method="post" action="captcha-test">';
    $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    $form .= '<p>' . captcha_img() . '</p>';
    $form .= '<p><input type="text" name="captcha"></p>';
    $form .= '<p><button type="submit" name="check">Check</button></p>';
    $form .= '</form>';
    return $form;
});
Route::get('/get_captcha/{config?}', function (\Mews\Captcha\Captcha $captcha, $config = 'default') {
    return $captcha->src($config);
});
/********operators routes*************/
// Authentication Routes...
Route::get('operator/login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('operator/login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::post('operator/logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);


// Password Reset Routes...
Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
    'as' => '',
    'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('operator/register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('operator/register', [
    'as' => '',
    'uses' => 'Auth\RegisterController@register'
]);
Route::group(['prefix'=>'operator','as'=>'operator.'] ,function(){
    Route::get('/','OperatorController@operator_panel');
    Route::get('/conversation','ConversationController@index')->name('allconv');
    Route::get('/conversations','ConversationController@index_all');
    Route::get('/conversations/{id}','ConversationController@show_one');
    Route::get('/conversation/{id}','ConversationController@show');
    Route::post('recievemessage',['as'=>'recievemessage','uses'=>'MessageController@recievemessage']);
    Route::post('sendmessage',['as'=>'sendmessage','uses'=>'MessageController@sendmessage']);
    Route::post('disactive',['as'=>'disactive','uses'=>'ConversationController@DisactiveConversation']);
    Route::post('active',['as'=>'active','uses'=>'ConversationController@ActiveConversation']);
    Route::post('endconv',['as'=>'endconv','uses'=>'ConversationController@EndConversation']);
    Route::get('count',function(){
        $count= App\Conversation::ConversationCount();
        return view('vendor.adminlte.conversation.count',compact('count'));
    })->name('count');
});


Route::group(['domain'=>'company'],function (){
    //site index route
    Route::get('/', function (){
        return view('index_page');
    })->name('home');
    Route::get('/home', 'HomeController@home')->name('home2');
/*    Route::get('/exchange', 'HomeController@exchange')->name('exchange');*/
/*    Route::get('/product/{product}','ProductController@show')->name('product.show');*/

});

//admin route group
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function()
{
    Route::get('/','AdminController@admin_panel')->name('admin');
    route::resource('admin','AdminController',['except'=>['destroy']]);
    Route::post('admin/socials',['as'=>'socials','uses'=>'HomeController@socials']);
    Route::post('admin/config',['as'=>'config','uses'=>'HomeController@config']);
   /* route::resource('seller','SellerController',['except'=>['destroy']]);
    Route::get('sellers/register',['as'=>'sellers.register','uses'=> 'SellerAuth\RegisterController@showRegistrationForm']);
    Route::post('sellers/register',['as'=>'sellers.register','uses'=> 'SellerAuth\RegisterController@register']);*/
    // Registration Routes...
    Route::get('/register',['as'=>'register','uses'=> 'AdminAuth\RegisterController@showRegistrationForm']);
    Route::post('/register',['as'=>'register','uses'=> 'AdminAuth\RegisterController@register']);
    //Login Routes...
    Route::get('/login',['as'=>'login','uses'=>'AdminAuth\LoginController@showLoginForm']);
    Route::post('/login',['as'=>'login','uses'=>'AdminAuth\LoginController@login']);
    Route::get('/logout',['as'=>'logout','uses'=>'AdminAuth\LoginController@logout']);
    /******company routes ***********/
    Route::resource('company', 'CompanyController', ['except' => ['destroy']]);
    Route::delete('company/{id}','CompanyController@destroy')->name('company.delete');
    Route::resource('operator', 'OperatorController', ['except' => ['destroy']]);
    Route::delete('operator/{id}','OperatorController@destroy')->name('operator.delete');
    Route::resource('department', 'DepartmentController', ['except' => ['destroy']]);
    Route::delete('department/{id}','DepartmentController@destroy')->name('department.delete');
    Route::post('admin/loadepartment','DepartmentController@load_department')->name('loadepartment');
    Route::post('admin/loadoperators','OperatorController@load_operator')->name('loadoperator');
});
//product website side routes index

/**
 * Module Routes image manager
 */
Route::get('image-manager/view/{id}/thumb', [
    'as' => 'showthumb',
    'uses' => '\\Joselfonseca\\ImageManager\\Controllers\\ImageManagerController@thumb'
]);

Route::get('image-manager/view/{id}/{width?}/{height?}/{canvas?}', [
    'as' => 'media',
    'uses' => '\\Joselfonseca\\ImageManager\\Controllers\\ImageManagerController@full'
])->where('width', '[0-9]+')->where('height', '[0-9]+')->where('canvas', 'canvas');

Route::group(['middleware' => config('image-manager.middleware')], function() {

    Route::get('image-manager', [
        'as' => 'ImageManager',
        'uses' => '\\Joselfonseca\\ImageManager\\Controllers\\ImageManagerController@index'
    ]);

    Route::post('upload-image', [
        'as' => 'ImageManagerUpload',
        'uses' => '\\Joselfonseca\\ImageManager\\Controllers\\ImageManagerController@store'
    ]);

    Route::get('image-manager-images', [
        'as' => 'ImageManagerImages',
        'uses' => '\\Joselfonseca\\ImageManager\\Controllers\\ImageManagerController@getImages'
    ]);

    Route::get('image-manager/delete/{id}', [
        'as' => 'ImageManagerDelete',
        'uses' => '\\Joselfonseca\\ImageManager\\Controllers\\ImageManagerController@delete'
    ]);
});

////////add comment controller
/*Route::resource('comment','CommentController',['except'=>'show','destroy']);*/


Route::group(['prefix' => 'company', 'as' => 'company.'], function() {
        Route::get('/', 'CompanyController@Company_panel')->name('Company');
    Route::get('/register', ['as' => 'register', 'uses' => 'CompanyAuth\RegisterController@showRegistrationForm']);
    Route::post('/register', ['as' => 'register', 'uses' => 'CompanyAuth\RegisterController@register']);
    Route::get('/login', ['as' => 'login', 'uses' => 'CompanyAuth\LoginController@showLoginForm']);
    Route::post('/login', ['as' => 'login', 'uses' => 'CompanyAuth\LoginController@login']);
    Route::get('/logout', ['as' => 'logout', 'uses' => 'CompanyAuth\LoginController@logout']);
});





/********operators routes*************/
// Authentication Routes...
/*Route::get('company/login', [
    'as' => 'login',
    'uses' => 'CompanyAuth\LoginController@showLoginForm'
]);
Route::post('company/login', [
    'as' => '',
    'uses' => 'CompanyAuth\LoginController@login'
]);
Route::post('company/logout', [
    'as' => 'logout',
    'uses' => 'CompanyAuth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('company/password/email', [
    'as' => 'password.email',
    'uses' => 'CompanyAuth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('company/password/reset', [
    'as' => 'password.request',
    'uses' => 'CompanyAuth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('company/password/reset', [
    'as' => '',
    'uses' => 'CompanyAuth\ResetPasswordController@reset'
]);
Route::get('company/password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'CompanyAuth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('company/register', [
    'as' => 'register',
    'uses' => 'CompanyAuth\RegisterController@showRegistrationForm'
]);
Route::post('company/register', [
    'as' => '',
    'uses' => 'CompanyAuth\RegisterController@register'
]);
Route::group(['prefix'=>'company','as'=>'company.'] ,function(){
    Route::get('/', 'CompanyController@Company_panel')->name('Company');
});*/

// Media-Manager
ctf0\MediaManager\MediaRoutes::routes();

/*
//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});


//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});*/


//Clear log file:
/*Route::get('/log-clear', function() {
    $exitCode = Artisan::call('log:clear');
    return '<h1>log file cleared</h1>';
});*/