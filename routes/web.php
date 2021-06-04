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

Route::get('/', 'DashboardController@home')->name('public');

Route::get('/home', 'DashboardController@home')->name('home');
Route::get('/category/{id}', 'DashboardController@categorybyfood')->name('category_by_food');
Route::get('/About', 'DashboardController@aboutUs')->name('aboutUs');

//Student Login Controller Route
Route::get('/student.login', 'StudentLoginController@student')->name('login.page');
Route::post('/student-login', 'StudentLoginController@studentLogin')->name('student-login');
Route::get('/student_logout', 'StudentLoginController@studentlogout')->name('student_logout');

//Cart Controller
Route::get('/cart', 'Cart\CartController@showCart')->name('cart');
Route::get('/updatecart/{qty}/{id}', 'Cart\CartController@updateCart')->name('update.cart');
Route::post('/add-to-cart', 'Cart\CartController@addToCart')->name('add.to.cart');
Route::post('/RemoveCart', 'Cart\CartController@RemoveCart')->name('Remove.Cart');
Route::get('/checkout', 'Cart\CartController@checkout')->name('checkout');
Route::post('/save-order', 'Cart\CartController@saveOrder')->name('save-order');


//Student Register Controller Route
Route::get('/student/register', 'StudentRegisterController@register')->name('student.register');
Route::post('/student_registerby', 'StudentRegisterController@studentRregister');


//Profile Controller Route
Route::get('/profile', 'Profile\ProfileController@profile')->name('profile');
Route::get('/order-cancel/{id}', 'Profile\ProfileController@cancel')->name('order.cancel');


//Contact controller Router
Route::get('/contact', 'ContactController@contact_index')->name('Contactus');
Route::post('/save_message', 'ContactController@message_save');

//its for admin
Route::get('/show-message', 'ContactController@show_message')->name('show.message');
Route::get('/admin', 'Admin\DashboardController@index')->name('admin.index');
Route::post('/dashboard', 'Admin\DashboardController@admin_login')->name('admin-login');



Route::group(['namespace' => 'admin', 'middleware' => 'login'], function () {

    //Dashboard Controller
   
    Route::get('/admin_logout', 'DashboardController@admin_logout')->name('admin-logout');
    Route::get('/admin-dashboard', 'DashboardController@admin_dashboard')->name('admin-dashboard');

    // Order food controller route
    Route::get('/admin/order', 'OrderFoodController@index')->name('food.order');
    Route::get('/admin/order/{id}', 'OrderFoodController@view')->name('food.orderview');
    Route::get('/admin/confirm/{id}', 'OrderFoodController@confirm')->name('confirm');
    Route::get('/admin/complete/{id}', 'OrderFoodController@complete')->name('complete');

    //Food manage Student Conroller route
    Route::get('/admin/student_manage', 'ManageStudentController@index')->name('student_information');
    Route::get('/admin/student_add', 'ManageStudentController@add_student')->name('student.add');
    Route::post('/student_register', 'ManageStudentController@student_register')->name('student_registerby_admin');
    Route::get('/view/{id}', 'ManageStudentController@viewinfo')->name('view_student');
    Route::get('/Student/edit/{id}', 'ManageStudentController@edit_info')->name('student_edit');
    Route::post('/Student/update/{id}', 'ManageStudentController@update_st_info')->name('update_st_info');
    Route::post('/delete_student/{id}', 'ManageStudentController@delete_student')->name('delete_student');
   // Route::post('/change_password/{id}', 'ManageStudentController@change_password')->name('change.password');

    //Food Controller route
    Route::get('/admin/food', 'FoodController@index')->name('Add.food');
    Route::get('/admin/manage', 'FoodController@manage_food')->name('manage.food');
    Route::post('/save_food_item', 'FoodController@save_food')->name('save.food');
    Route::get('/admin/user/manage', 'ManageUserController@user_manage');
    Route::get('/unactive_food/{id}', 'FoodController@unactive_food')->name('unactive_food');
    Route::get('/active_food/{id}', 'FoodController@active_food')->name('active_food');
    Route::post('/delete_food/{id}', 'FoodController@delete_food')->name('delete_food');
    Route::get('/edit/{id}', 'FoodController@edit')->name('edit');
    Route::post('/edit_food_item/{id}', 'FoodController@edit_food');

    //Admin  Controller Route
    Route::get('/show-admin', 'AdminController@show_admin')->name('show.admin');
    Route::get('/active-admin/{id}', 'AdminController@active_admin')->name('active.admin');
    Route::get('/unactive-admin/{id}', 'AdminController@unactive_admin')->name('unactive.admin');
    Route::get('/add-admin', 'AdminController@add_admin')->name('add.admin');
    Route::post('/save-admin', 'AdminController@save_admin')->name('save-admin');
    Route::post('/admin-delete/{id}', 'AdminController@admin_delete')->name('admin.delete');
    Route::get('/admin-edit/{id}', 'AdminController@admin_edit')->name('admin.edit');
    Route::post('/admin-update/{id}', 'AdminController@update_admin')->name('update.admin');


    Route::get('/sell-report', 'SellReportController@index')->name('sellreport.index');
    Route::post('/sell-report', 'SellReportController@get')->name('sellreport.index');

});
