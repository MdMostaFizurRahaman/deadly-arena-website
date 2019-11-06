<?php

    Route::GET('/home', 'AdminController@index')->name('admin.home');
    // Login and Logout
    Route::GET('/', 'LoginController@showLoginForm')->name('admin.login');
    Route::POST('/', 'LoginController@login');
    Route::POST('/logout', 'LoginController@logout')->name('admin.logout');

    // Password Resets
    Route::POST('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::GET('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::POST('/password/reset', 'ResetPasswordController@reset');
    Route::GET('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::GET('/password/change', 'AdminController@showChangePasswordForm')->name('admin.password.change');
    Route::POST('/password/change', 'AdminController@changePassword');

    // Register Admins
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'RegisterController@register');
    Route::get('/{admin}/edit', 'RegisterController@edit')->name('admin.edit');
    Route::get('/profile/{id}', 'ProfileController@profile')->name('admin.profile');
    Route::delete('/{admin}', 'RegisterController@destroy')->name('admin.delete');
    Route::patch('/{admin}', 'RegisterController@update')->name('admin.update');
    Route::patch('/profile/{admin}', 'ProfileController@updateProfile')->name('admin.update.profile');

    // Admin Lists
    Route::get('/show', 'AdminController@show')->name('admin.show');

    // Admin Roles
    Route::post('/{admin}/role/{role}', 'AdminRoleController@attach')->name('admin.attach.roles');
    Route::delete('/{admin}/role/{role}', 'AdminRoleController@detach');

    // Roles
    Route::get('/roles', 'RoleController@index')->name('admin.roles');
    Route::get('/role/create', 'RoleController@create')->name('admin.role.create');
    Route::post('/role/store', 'RoleController@store')->name('admin.role.store');
    Route::delete('/role/{role}', 'RoleController@destroy')->name('admin.role.delete');
    Route::get('/role/{role}/edit', 'RoleController@edit')->name('admin.role.edit');
    Route::post('/role/{role}', 'RoleController@update')->name('admin.role.update');


    // Category Route
    Route::get('/category', 'CategoryController@index')->name('admin.category');
    Route::get('/category/create', 'CategoryController@create')->name('admin.category.create');
    Route::post('/category/store', 'CategoryController@store')->name('admin.category.store');
    Route::get('/category/destroy/{id}', 'CategoryController@destroy')->name('admin.category.delete');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('admin.category.update');

    // Option
    Route::get('/option', 'OptionController@index')->name('admin.option');
    Route::get('/option/create', 'OptionController@create')->name('admin.option.create');
    Route::post('/option/store', 'OptionController@store')->name('admin.option.store');
    Route::get('/option/destroy/{id}', 'OptionController@destroy')->name('admin.option.delete');
    Route::get('/option/edit/{id}', 'OptionController@edit')->name('admin.option.edit');
    Route::post('/option/update/{id}', 'OptionController@update')->name('admin.option.update');

     // Asset
     Route::get('/asset', 'AssetController@index')->name('admin.asset');
     Route::get('/asset/create', 'AssetController@create')->name('admin.asset.create');
     Route::post('/asset/store', 'AssetController@store')->name('admin.asset.store');
     Route::get('/asset/destroy/{id}', 'AssetController@destroy')->name('admin.asset.delete');
     Route::get('/asset/deleteOption/', 'AssetController@deleteOption')->name('admin.asset.delete.option');
     Route::get('/asset/edit/{id}', 'AssetController@edit')->name('admin.asset.edit');
     Route::post('/asset/update/{id}', 'AssetController@update')->name('admin.asset.update');

     
     // Player
     Route::get('/player', 'PlayerController@index')->name('admin.player');
     Route::get('/player/create', 'PlayerController@create')->name('admin.player.create');
     Route::post('/player/store', 'PlayerController@store')->name('admin.player.store');
     Route::get('/player/{id}', 'PlayerController@destroy')->name('admin.player.delete');
     Route::get('/player/edit/{id}', 'PlayerController@edit')->name('admin.player.edit');
     Route::get('/player/status/update/', 'PlayerController@updateStatus')->name('admin.player.status.update');
     Route::patch('/player/{id}', 'PlayerController@update')->name('admin.player.update');


    // blog
     Route::get('/post', 'PostController@index')->name('admin.post');
     Route::get('/post/create', 'PostController@create')->name('admin.post.create');
     Route::post('/post/store', 'PostController@store')->name('admin.post.store');
     Route::get('/post/{id}', 'PostController@destroy')->name('admin.post.delete');
     Route::get('/post/edit/{id}', 'PostController@edit')->name('admin.post.edit');
     Route::get('/post/status/update/', 'PostController@updateStatus')->name('admin.post.status.update');
     Route::post('/post/update/{id}', 'PostController@update')->name('admin.post.update');

     
     // Setting
     Route::get('/setting', 'SettingController@index')->name('admin.settings');
     Route::post('/setting/general', 'SettingController@generalSettings')->name('admin.settings.general');
     Route::post('/setting/heroImage', 'SettingController@heroImageSettings')->name('admin.settings.heroImage');
     Route::post('/setting/promotion', 'SettingController@promotionSettings')->name('admin.settings.promotion');
     Route::post('/setting/blog', 'SettingController@blogSettings')->name('admin.settings.blog');
     Route::post('/setting/footer', 'SettingController@footerSettings')->name('admin.settings.footer');

    Route::fallback(function () {
        return abort(404);
    });
