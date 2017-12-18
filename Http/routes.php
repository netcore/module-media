<?php

Route::group([
    'prefix'     => 'admin/media/packages/filemanager',
    'as'         => 'admin::media.',
], function () {
    Route::resource('api/crip-folders', '\Crip\Filesys\App\Controllers\FolderController');
    Route::resource('api/crip-files', '\Crip\Filesys\App\Controllers\FileController');
    Route::get('api/crip-tree', '\Crip\Filesys\App\Controllers\TreeController');
    Route::get('/', '\Crip\Filesys\App\Controllers\ManagerController');

    Route::get('api/crip-folders/{location?}', '\Crip\Filesys\App\Controllers\FolderController@show')->where('location', '(.*)');
    Route::patch('api/crip-folders/{location?}', '\Crip\Filesys\App\Controllers\FolderController@update')->where('location', '(.*)');
    Route::delete('api/crip-folders/{location?}', '\Crip\Filesys\App\Controllers\FolderController@destroy')->where('location', '(.*)');

    Route::get('api/crip-files/{location?}', '\Crip\Filesys\App\Controllers\FileController@show')->where('location', '(.*)');
    Route::patch('api/crip-files/{location?}', '\Crip\Filesys\App\Controllers\FileController@update')->where('location', '(.*)');
    Route::delete('api/crip-files/{location?}', '\Crip\Filesys\App\Controllers\FileController@destroy')->where('location', '(.*)');
});