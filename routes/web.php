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

Route::get('/', function () {
    return redirect('/home');
});


Auth::routes();

Route::get('/home', 'HomeController@index', ['middleware' => ['auth']]);
Route::get('/pruebas', 'HomeController@pruebas');
Route::get('/view_script', ['as' => 'view_script', 'uses' => 'HomeController@view_script']);
Route::post('/script', ['as' => 'script', 'uses' => 'HomeController@script']);


Route::get('admin/permissions', ['as' => 'admin.permissions.index', 'uses' => 'Admin\PermissionController@index', 'middleware' => ['auth']]);
Route::post('admin/permissions', ['as' => 'admin.permissions.store', 'uses' => 'Admin\PermissionController@store', 'middleware' => ['auth']]);
Route::get('admin/permissions/create', ['as' => 'admin.permissions.create', 'uses' => 'Admin\PermissionController@create', 'middleware' => ['auth']]);
Route::put('admin/permissions/{permissions}', ['as' => 'admin.permissions.update', 'uses' => 'Admin\PermissionController@update', 'middleware' => ['auth']]);
Route::patch('admin/permissions/{permissions}', ['as' => 'admin.permissions.update', 'uses' => 'Admin\PermissionController@update', 'middleware' => ['auth']]);
Route::delete('admin/permissions/{permissions}', ['as' => 'admin.permissions.destroy', 'uses' => 'Admin\PermissionController@destroy', 'middleware' => ['auth']]);
Route::get('admin/permissions/{permissions}', ['as' => 'admin.permissions.show', 'uses' => 'Admin\PermissionController@show', 'middleware' => ['auth']]);
Route::get('admin/permissions/{permissions}/edit', ['as' => 'admin.permissions.edit', 'uses' => 'Admin\PermissionController@edit', 'middleware' => ['auth']]);


Route::get('admin/roles', ['as' => 'admin.roles.index', 'uses' => 'Admin\RoleController@index', 'middleware' => ['auth']]);
Route::post('admin/roles', ['as' => 'admin.roles.store', 'uses' => 'Admin\RoleController@store', 'middleware' => ['auth']]);
Route::get('admin/roles/create', ['as' => 'admin.roles.create', 'uses' => 'Admin\RoleController@create', 'middleware' => ['auth']]);
Route::put('admin/roles/{roles}', ['as' => 'admin.roles.update', 'uses' => 'Admin\RoleController@update', 'middleware' => ['auth']]);
Route::patch('admin/roles/{roles}', ['as' => 'admin.roles.update', 'uses' => 'Admin\RoleController@update', 'middleware' => ['auth']]);
Route::delete('admin/roles/{roles}', ['as' => 'admin.roles.destroy', 'uses' => 'Admin\RoleController@destroy', 'middleware' => ['auth']]);
Route::get('admin/roles/{roles}', ['as' => 'admin.roles.show', 'uses' => 'Admin\RoleController@show', 'middleware' => ['auth']]);
Route::get('admin/roles/{roles}/edit', ['as' => 'admin.roles.edit', 'uses' => 'Admin\RoleController@edit', 'middleware' => ['auth']]);


Route::get('admin/users', ['as' => 'admin.users.index', 'uses' => 'Admin\UserController@index', 'middleware' => ['auth']]);
Route::post('admin/users', ['as' => 'admin.users.store', 'uses' => 'Admin\UserController@store', 'middleware' => ['auth']]);
Route::get('admin/users/create', ['as' => 'admin.users.create', 'uses' => 'Admin\UserController@create', 'middleware' => ['auth']]);
Route::put('admin/users/{users}', ['as' => 'admin.users.update', 'uses' => 'Admin\UserController@update', 'middleware' => ['auth']]);
Route::patch('admin/users/{users}', ['as' => 'admin.users.update', 'uses' => 'Admin\UserController@update', 'middleware' => ['auth']]);
Route::delete('admin/users/{users}', ['as' => 'admin.users.destroy', 'uses' => 'Admin\UserController@destroy', 'middleware' => ['auth']]);
Route::get('admin/users/{users}', ['as' => 'admin.users.show', 'uses' => 'Admin\UserController@show', 'middleware' => ['auth']]);
Route::get('admin/users/{users}/edit', ['as' => 'admin.users.edit', 'uses' => 'Admin\UserController@edit', 'middleware' => ['auth']]);

Route::get('admin/users/editPassword/{users}', ['as' => 'admin.users.editPassword', 'uses' => 'Admin\UserController@editPassword', 'middleware' => ['auth']]);
Route::post('admin/users/updatePassword', ['as' => 'admin.users.updatePassword', 'uses' => 'Admin\UserController@updatePassword', 'middleware' => ['auth']]);

Route::get('admin/clientes', ['as' => 'admin.clientes.index', 'uses' => 'Admin\ClienteController@index', 'middleware' => ['auth']]);
Route::post('admin/clientes', ['as' => 'admin.clientes.store', 'uses' => 'Admin\ClienteController@store', 'middleware' => ['auth']]);
Route::get('admin/clientes/create', ['as' => 'admin.clientes.create', 'uses' => 'Admin\ClienteController@create', 'middleware' => ['auth']]);
Route::put('admin/clientes/{clientes}', ['as' => 'admin.clientes.update', 'uses' => 'Admin\ClienteController@update', 'middleware' => ['auth']]);
Route::patch('admin/clientes/{clientes}', ['as' => 'admin.clientes.update', 'uses' => 'Admin\ClienteController@update', 'middleware' => ['auth']]);
Route::delete('admin/clientes/{clientes}', ['as' => 'admin.clientes.destroy', 'uses' => 'Admin\ClienteController@destroy', 'middleware' => ['auth']]);
Route::get('admin/clientes/{clientes}', ['as' => 'admin.clientes.show', 'uses' => 'Admin\ClienteController@show', 'middleware' => ['auth']]);
Route::get('admin/clientes/{clientes}/edit', ['as' => 'admin.clientes.edit', 'uses' => 'Admin\ClienteController@edit', 'middleware' => ['auth']]);


Route::get('admin/amortizacions', ['as' => 'admin.amortizacions.index', 'uses' => 'Admin\AmortizacionController@index', 'middleware' => ['auth']]);
Route::post('admin/amortizacions', ['as' => 'admin.amortizacions.store', 'uses' => 'Admin\AmortizacionController@store', 'middleware' => ['auth']]);
Route::get('admin/amortizacions/create', ['as' => 'admin.amortizacions.create', 'uses' => 'Admin\AmortizacionController@create', 'middleware' => ['auth']]);
Route::put('admin/amortizacions/{amortizacions}', ['as' => 'admin.amortizacions.update', 'uses' => 'Admin\AmortizacionController@update', 'middleware' => ['auth']]);
Route::patch('admin/amortizacions/{amortizacions}', ['as' => 'admin.amortizacions.update', 'uses' => 'Admin\AmortizacionController@update', 'middleware' => ['auth']]);
Route::delete('admin/amortizacions/{amortizacions}', ['as' => 'admin.amortizacions.destroy', 'uses' => 'Admin\AmortizacionController@destroy', 'middleware' => ['auth']]);
Route::get('admin/amortizacions/{amortizacions}/edit', ['as' => 'admin.amortizacions.edit', 'uses' => 'Admin\AmortizacionController@edit', 'middleware' => ['auth']]);


Route::get('admin/modalidadPagos', ['as' => 'admin.modalidadPagos.index', 'uses' => 'Admin\ModalidadPagoController@index', 'middleware' => ['auth']]);
Route::post('admin/modalidadPagos', ['as' => 'admin.modalidadPagos.store', 'uses' => 'Admin\ModalidadPagoController@store', 'middleware' => ['auth']]);
Route::get('admin/modalidadPagos/create', ['as' => 'admin.modalidadPagos.create', 'uses' => 'Admin\ModalidadPagoController@create', 'middleware' => ['auth']]);
Route::put('admin/modalidadPagos/{modalidadPagos}', ['as' => 'admin.modalidadPagos.update', 'uses' => 'Admin\ModalidadPagoController@update', 'middleware' => ['auth']]);
Route::patch('admin/modalidadPagos/{modalidadPagos}', ['as' => 'admin.modalidadPagos.update', 'uses' => 'Admin\ModalidadPagoController@update', 'middleware' => ['auth']]);
Route::delete('admin/modalidadPagos/{modalidadPagos}', ['as' => 'admin.modalidadPagos.destroy', 'uses' => 'Admin\ModalidadPagoController@destroy', 'middleware' => ['auth']]);
Route::get('admin/modalidadPagos/{modalidadPagos}', ['as' => 'admin.modalidadPagos.show', 'uses' => 'Admin\ModalidadPagoController@show', 'middleware' => ['auth']]);
Route::get('admin/modalidadPagos/{modalidadPagos}/edit', ['as' => 'admin.modalidadPagos.edit', 'uses' => 'Admin\ModalidadPagoController@edit', 'middleware' => ['auth']]);


Route::get('admin/estadoPrestamos', ['as' => 'admin.estadoPrestamos.index', 'uses' => 'Admin\EstadoPrestamoController@index', 'middleware' => ['auth']]);
Route::post('admin/estadoPrestamos', ['as' => 'admin.estadoPrestamos.store', 'uses' => 'Admin\EstadoPrestamoController@store', 'middleware' => ['auth']]);
Route::get('admin/estadoPrestamos/create', ['as' => 'admin.estadoPrestamos.create', 'uses' => 'Admin\EstadoPrestamoController@create', 'middleware' => ['auth']]);
Route::put('admin/estadoPrestamos/{estadoPrestamos}', ['as' => 'admin.estadoPrestamos.update', 'uses' => 'Admin\EstadoPrestamoController@update', 'middleware' => ['auth']]);
Route::patch('admin/estadoPrestamos/{estadoPrestamos}', ['as' => 'admin.estadoPrestamos.update', 'uses' => 'Admin\EstadoPrestamoController@update', 'middleware' => ['auth']]);
Route::delete('admin/estadoPrestamos/{estadoPrestamos}', ['as' => 'admin.estadoPrestamos.destroy', 'uses' => 'Admin\EstadoPrestamoController@destroy', 'middleware' => ['auth']]);
Route::get('admin/estadoPrestamos/{estadoPrestamos}', ['as' => 'admin.estadoPrestamos.show', 'uses' => 'Admin\EstadoPrestamoController@show', 'middleware' => ['auth']]);
Route::get('admin/estadoPrestamos/{estadoPrestamos}/edit', ['as' => 'admin.estadoPrestamos.edit', 'uses' => 'Admin\EstadoPrestamoController@edit', 'middleware' => ['auth']]);


Route::get('admin/prestamos', ['as' => 'admin.prestamos.index', 'uses' => 'Admin\PrestamoController@index', 'middleware' => ['auth']]);
Route::post('admin/prestamos', ['as' => 'admin.prestamos.store', 'uses' => 'Admin\PrestamoController@store', 'middleware' => ['auth']]);
Route::get('admin/prestamos/create', ['as' => 'admin.prestamos.create', 'uses' => 'Admin\PrestamoController@create', 'middleware' => ['auth']]);
Route::put('admin/prestamos/{prestamos}', ['as' => 'admin.prestamos.update', 'uses' => 'Admin\PrestamoController@update', 'middleware' => ['auth']]);
Route::patch('admin/prestamos/{prestamos}', ['as' => 'admin.prestamos.update', 'uses' => 'Admin\PrestamoController@update', 'middleware' => ['auth']]);
Route::delete('admin/prestamos/{prestamos}', ['as' => 'admin.prestamos.destroy', 'uses' => 'Admin\PrestamoController@destroy', 'middleware' => ['auth']]);
Route::get('admin/prestamos/{prestamos}', ['as' => 'admin.prestamos.show', 'uses' => 'Admin\PrestamoController@show', 'middleware' => ['auth']]);
Route::get('admin/prestamos/{prestamos}/edit', ['as' => 'admin.prestamos.edit', 'uses' => 'Admin\PrestamoController@edit', 'middleware' => ['auth']]);
Route::get('get_amortizacion', ['as' => 'get_amortizacion', 'uses' => 'Admin\PrestamoController@getAmortizacion', 'middleware' => ['auth']]);
Route::get('admin/prestamos/cancelar/{prestamos}', ['as' => 'admin.prestamos.cancelar', 'uses' => 'Admin\PrestamoController@cancelar', 'middleware' => ['auth']]);


Route::get('admin/formaPagos', ['as' => 'admin.formaPagos.index', 'uses' => 'Admin\FormaPagoController@index', 'middleware' => ['auth']]);
Route::post('admin/formaPagos', ['as' => 'admin.formaPagos.store', 'uses' => 'Admin\FormaPagoController@store', 'middleware' => ['auth']]);
Route::get('admin/formaPagos/create', ['as' => 'admin.formaPagos.create', 'uses' => 'Admin\FormaPagoController@create', 'middleware' => ['auth']]);
Route::put('admin/formaPagos/{formaPagos}', ['as' => 'admin.formaPagos.update', 'uses' => 'Admin\FormaPagoController@update', 'middleware' => ['auth']]);
Route::patch('admin/formaPagos/{formaPagos}', ['as' => 'admin.formaPagos.update', 'uses' => 'Admin\FormaPagoController@update', 'middleware' => ['auth']]);
Route::delete('admin/formaPagos/{formaPagos}', ['as' => 'admin.formaPagos.destroy', 'uses' => 'Admin\FormaPagoController@destroy', 'middleware' => ['auth']]);
Route::get('admin/formaPagos/{formaPagos}', ['as' => 'admin.formaPagos.show', 'uses' => 'Admin\FormaPagoController@show', 'middleware' => ['auth']]);
Route::get('admin/formaPagos/{formaPagos}/edit', ['as' => 'admin.formaPagos.edit', 'uses' => 'Admin\FormaPagoController@edit', 'middleware' => ['auth']]);


Route::get('admin/pagos', ['as' => 'admin.pagos.index', 'uses' => 'Admin\PagoController@index', 'middleware' => ['auth']]);
Route::post('admin/pagos', ['as' => 'admin.pagos.store', 'uses' => 'Admin\PagoController@store', 'middleware' => ['auth']]);
Route::get('admin/pagos/create/{pagos}', ['as' => 'admin.pagos.create', 'uses' => 'Admin\PagoController@create', 'middleware' => ['auth']]);
Route::put('admin/pagos/{pagos}', ['as' => 'admin.pagos.update', 'uses' => 'Admin\PagoController@update', 'middleware' => ['auth']]);
Route::patch('admin/pagos/{pagos}', ['as' => 'admin.pagos.update', 'uses' => 'Admin\PagoController@update', 'middleware' => ['auth']]);
Route::delete('admin/pagos/{pagos}', ['as' => 'admin.pagos.destroy', 'uses' => 'Admin\PagoController@destroy', 'middleware' => ['auth']]);
Route::get('admin/pagos/{pagos}', ['as' => 'admin.pagos.show', 'uses' => 'Admin\PagoController@show', 'middleware' => ['auth']]);
Route::get('admin/pagos/{pagos}/edit', ['as' => 'admin.pagos.edit', 'uses' => 'Admin\PagoController@edit', 'middleware' => ['auth']]);
