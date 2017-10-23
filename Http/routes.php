<?php

Route::group([
    'prefix'     => 'admin/media',
    'as'         => 'admin::media.',
    'middleware' => ['web', 'auth.admin'],
    'namespace'  => 'Modules\Media\Http\Controllers\Admin'
], function () {
    Route::get('/', 'MediaController@index');
});
