<?php

/**
 * Форма авторизации
 */
Route::get('login', 'home@login');

/**
 * Попытка авторизации пользователя
 */
Route::post('auth_me', function() {
	
	if (Auth::attempt($_POST)) {
		
		return Redirect::to('/');
	}
	else {
		
		return Redirect::to('login');
	}
});

/**
 * Главная страница
 */
Route::get('/', array('before' => 'auth', 'uses' => 'home@index'));

/**
 * Методы получения дополнительной инфы из яваскрипта
 */
Route::get('/tasks/all_issues', array('before' => 'auth', 'uses' => 'tasks@all_issues'));
Route::get('/tasks/all_users',  array('before' => 'auth', 'uses' => 'tasks@all_users'));
Route::get('/tasks/all_sprints',  array('before' => 'auth', 'uses' => 'tasks@all_sprints'));
Route::get('/tasks/test',  array('before' => 'auth', 'uses' => 'tasks@test'));

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function() {
	
	if (Auth::guest()) {
		return Redirect::to('login');
	}
});