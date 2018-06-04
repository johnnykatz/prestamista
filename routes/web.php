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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/pruebas', 'HomeController@pruebas');
Route::get('/view_script', ['as' => 'view_script', 'uses' => 'HomeController@view_script']);
Route::post('/script', ['as' => 'script', 'uses' => 'HomeController@script']);


Route::get('admin/permissions', ['as' => 'admin.permissions.index', 'uses' => 'Admin\PermissionController@index']);
Route::post('admin/permissions', ['as' => 'admin.permissions.store', 'uses' => 'Admin\PermissionController@store']);
Route::get('admin/permissions/create', ['as' => 'admin.permissions.create', 'uses' => 'Admin\PermissionController@create']);
Route::put('admin/permissions/{permissions}', ['as' => 'admin.permissions.update', 'uses' => 'Admin\PermissionController@update']);
Route::patch('admin/permissions/{permissions}', ['as' => 'admin.permissions.update', 'uses' => 'Admin\PermissionController@update']);
Route::delete('admin/permissions/{permissions}', ['as' => 'admin.permissions.destroy', 'uses' => 'Admin\PermissionController@destroy']);
Route::get('admin/permissions/{permissions}', ['as' => 'admin.permissions.show', 'uses' => 'Admin\PermissionController@show']);
Route::get('admin/permissions/{permissions}/edit', ['as' => 'admin.permissions.edit', 'uses' => 'Admin\PermissionController@edit']);


Route::get('admin/roles', ['as' => 'admin.roles.index', 'uses' => 'Admin\RoleController@index']);
Route::post('admin/roles', ['as' => 'admin.roles.store', 'uses' => 'Admin\RoleController@store']);
Route::get('admin/roles/create', ['as' => 'admin.roles.create', 'uses' => 'Admin\RoleController@create']);
Route::put('admin/roles/{roles}', ['as' => 'admin.roles.update', 'uses' => 'Admin\RoleController@update']);
Route::patch('admin/roles/{roles}', ['as' => 'admin.roles.update', 'uses' => 'Admin\RoleController@update']);
Route::delete('admin/roles/{roles}', ['as' => 'admin.roles.destroy', 'uses' => 'Admin\RoleController@destroy']);
Route::get('admin/roles/{roles}', ['as' => 'admin.roles.show', 'uses' => 'Admin\RoleController@show']);
Route::get('admin/roles/{roles}/edit', ['as' => 'admin.roles.edit', 'uses' => 'Admin\RoleController@edit']);


Route::get('admin/users', ['as' => 'admin.users.index', 'uses' => 'Admin\UserController@index']);
Route::post('admin/users', ['as' => 'admin.users.store', 'uses' => 'Admin\UserController@store']);
Route::get('admin/users/create', ['as' => 'admin.users.create', 'uses' => 'Admin\UserController@create']);
Route::put('admin/users/{users}', ['as' => 'admin.users.update', 'uses' => 'Admin\UserController@update']);
Route::patch('admin/users/{users}', ['as' => 'admin.users.update', 'uses' => 'Admin\UserController@update']);
Route::delete('admin/users/{users}', ['as' => 'admin.users.destroy', 'uses' => 'Admin\UserController@destroy']);
Route::get('admin/users/{users}', ['as' => 'admin.users.show', 'uses' => 'Admin\UserController@show']);
Route::get('admin/users/{users}/edit', ['as' => 'admin.users.edit', 'uses' => 'Admin\UserController@edit']);

Route::get('admin/users/editPassword/{users}', ['as' => 'admin.users.editPassword', 'uses' => 'Admin\UserController@editPassword', 'middleware' => ['auth']]);
Route::post('admin/users/updatePassword', ['as' => 'admin.users.updatePassword', 'uses' => 'Admin\UserController@updatePassword', 'middleware' => ['auth']]);

Route::get('admin/clientes', ['as' => 'admin.clientes.index', 'uses' => 'Admin\ClienteController@index']);
Route::post('admin/clientes', ['as' => 'admin.clientes.store', 'uses' => 'Admin\ClienteController@store']);
Route::get('admin/clientes/create', ['as' => 'admin.clientes.create', 'uses' => 'Admin\ClienteController@create']);
Route::put('admin/clientes/{clientes}', ['as' => 'admin.clientes.update', 'uses' => 'Admin\ClienteController@update']);
Route::patch('admin/clientes/{clientes}', ['as' => 'admin.clientes.update', 'uses' => 'Admin\ClienteController@update']);
Route::delete('admin/clientes/{clientes}', ['as' => 'admin.clientes.destroy', 'uses' => 'Admin\ClienteController@destroy']);
Route::get('admin/clientes/{clientes}', ['as' => 'admin.clientes.show', 'uses' => 'Admin\ClienteController@show']);
Route::get('admin/clientes/{clientes}/edit', ['as' => 'admin.clientes.edit', 'uses' => 'Admin\ClienteController@edit']);


Route::get('admin/amortizacions', ['as' => 'admin.amortizacions.index', 'uses' => 'Admin\AmortizacionController@index']);
Route::post('admin/amortizacions', ['as' => 'admin.amortizacions.store', 'uses' => 'Admin\AmortizacionController@store']);
Route::get('admin/amortizacions/create', ['as' => 'admin.amortizacions.create', 'uses' => 'Admin\AmortizacionController@create']);
Route::put('admin/amortizacions/{amortizacions}', ['as' => 'admin.amortizacions.update', 'uses' => 'Admin\AmortizacionController@update']);
Route::patch('admin/amortizacions/{amortizacions}', ['as' => 'admin.amortizacions.update', 'uses' => 'Admin\AmortizacionController@update']);
Route::delete('admin/amortizacions/{amortizacions}', ['as' => 'admin.amortizacions.destroy', 'uses' => 'Admin\AmortizacionController@destroy']);
Route::get('admin/amortizacions/{amortizacions}', ['as' => 'admin.amortizacions.show', 'uses' => 'Admin\AmortizacionController@show']);
Route::get('admin/amortizacions/{amortizacions}/edit', ['as' => 'admin.amortizacions.edit', 'uses' => 'Admin\AmortizacionController@edit']);


Route::get('admin/modalidadPagos', ['as' => 'admin.modalidadPagos.index', 'uses' => 'Admin\ModalidadPagoController@index']);
Route::post('admin/modalidadPagos', ['as' => 'admin.modalidadPagos.store', 'uses' => 'Admin\ModalidadPagoController@store']);
Route::get('admin/modalidadPagos/create', ['as' => 'admin.modalidadPagos.create', 'uses' => 'Admin\ModalidadPagoController@create']);
Route::put('admin/modalidadPagos/{modalidadPagos}', ['as' => 'admin.modalidadPagos.update', 'uses' => 'Admin\ModalidadPagoController@update']);
Route::patch('admin/modalidadPagos/{modalidadPagos}', ['as' => 'admin.modalidadPagos.update', 'uses' => 'Admin\ModalidadPagoController@update']);
Route::delete('admin/modalidadPagos/{modalidadPagos}', ['as' => 'admin.modalidadPagos.destroy', 'uses' => 'Admin\ModalidadPagoController@destroy']);
Route::get('admin/modalidadPagos/{modalidadPagos}', ['as' => 'admin.modalidadPagos.show', 'uses' => 'Admin\ModalidadPagoController@show']);
Route::get('admin/modalidadPagos/{modalidadPagos}/edit', ['as' => 'admin.modalidadPagos.edit', 'uses' => 'Admin\ModalidadPagoController@edit']);


Route::get('admin/estadoPrestamos', ['as' => 'admin.estadoPrestamos.index', 'uses' => 'Admin\EstadoPrestamoController@index']);
Route::post('admin/estadoPrestamos', ['as' => 'admin.estadoPrestamos.store', 'uses' => 'Admin\EstadoPrestamoController@store']);
Route::get('admin/estadoPrestamos/create', ['as' => 'admin.estadoPrestamos.create', 'uses' => 'Admin\EstadoPrestamoController@create']);
Route::put('admin/estadoPrestamos/{estadoPrestamos}', ['as' => 'admin.estadoPrestamos.update', 'uses' => 'Admin\EstadoPrestamoController@update']);
Route::patch('admin/estadoPrestamos/{estadoPrestamos}', ['as' => 'admin.estadoPrestamos.update', 'uses' => 'Admin\EstadoPrestamoController@update']);
Route::delete('admin/estadoPrestamos/{estadoPrestamos}', ['as' => 'admin.estadoPrestamos.destroy', 'uses' => 'Admin\EstadoPrestamoController@destroy']);
Route::get('admin/estadoPrestamos/{estadoPrestamos}', ['as' => 'admin.estadoPrestamos.show', 'uses' => 'Admin\EstadoPrestamoController@show']);
Route::get('admin/estadoPrestamos/{estadoPrestamos}/edit', ['as' => 'admin.estadoPrestamos.edit', 'uses' => 'Admin\EstadoPrestamoController@edit']);


Route::get('admin/prestamos', ['as' => 'admin.prestamos.index', 'uses' => 'Admin\PrestamoController@index']);
Route::post('admin/prestamos', ['as' => 'admin.prestamos.store', 'uses' => 'Admin\PrestamoController@store']);
Route::get('admin/prestamos/create', ['as' => 'admin.prestamos.create', 'uses' => 'Admin\PrestamoController@create']);
Route::put('admin/prestamos/{prestamos}', ['as' => 'admin.prestamos.update', 'uses' => 'Admin\PrestamoController@update']);
Route::patch('admin/prestamos/{prestamos}', ['as' => 'admin.prestamos.update', 'uses' => 'Admin\PrestamoController@update']);
Route::delete('admin/prestamos/{prestamos}', ['as' => 'admin.prestamos.destroy', 'uses' => 'Admin\PrestamoController@destroy']);
Route::get('admin/prestamos/{prestamos}', ['as' => 'admin.prestamos.show', 'uses' => 'Admin\PrestamoController@show']);
Route::get('admin/prestamos/{prestamos}/edit', ['as' => 'admin.prestamos.edit', 'uses' => 'Admin\PrestamoController@edit']);


Route::get('admin/formaPagos', ['as' => 'admin.formaPagos.index', 'uses' => 'Admin\FormaPagoController@index']);
Route::post('admin/formaPagos', ['as' => 'admin.formaPagos.store', 'uses' => 'Admin\FormaPagoController@store']);
Route::get('admin/formaPagos/create', ['as' => 'admin.formaPagos.create', 'uses' => 'Admin\FormaPagoController@create']);
Route::put('admin/formaPagos/{formaPagos}', ['as' => 'admin.formaPagos.update', 'uses' => 'Admin\FormaPagoController@update']);
Route::patch('admin/formaPagos/{formaPagos}', ['as' => 'admin.formaPagos.update', 'uses' => 'Admin\FormaPagoController@update']);
Route::delete('admin/formaPagos/{formaPagos}', ['as' => 'admin.formaPagos.destroy', 'uses' => 'Admin\FormaPagoController@destroy']);
Route::get('admin/formaPagos/{formaPagos}', ['as' => 'admin.formaPagos.show', 'uses' => 'Admin\FormaPagoController@show']);
Route::get('admin/formaPagos/{formaPagos}/edit', ['as' => 'admin.formaPagos.edit', 'uses' => 'Admin\FormaPagoController@edit']);


Route::get('admin/pagos', ['as' => 'admin.pagos.index', 'uses' => 'Admin\PagoController@index']);
Route::post('admin/pagos', ['as' => 'admin.pagos.store', 'uses' => 'Admin\PagoController@store']);
Route::get('admin/pagos/create/{pagos}', ['as' => 'admin.pagos.create', 'uses' => 'Admin\PagoController@create']);
Route::put('admin/pagos/{pagos}', ['as' => 'admin.pagos.update', 'uses' => 'Admin\PagoController@update']);
Route::patch('admin/pagos/{pagos}', ['as' => 'admin.pagos.update', 'uses' => 'Admin\PagoController@update']);
Route::delete('admin/pagos/{pagos}', ['as' => 'admin.pagos.destroy', 'uses' => 'Admin\PagoController@destroy']);
Route::get('admin/pagos/{pagos}', ['as' => 'admin.pagos.show', 'uses' => 'Admin\PagoController@show']);
Route::get('admin/pagos/{pagos}/edit', ['as' => 'admin.pagos.edit', 'uses' => 'Admin\PagoController@edit']);
