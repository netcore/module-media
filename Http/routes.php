<?php

Route::group([
    'prefix'     => 'admin/media/packages/filemanager',
    'as'         => 'admin::media.',
], function () {
    Route::resource('api/crip-folders', '\Crip\Filesys\App\Controllers\FolderController');
    Route::resource('api/crip-files', '\Crip\Filesys\App\Controllers\FileController');
    Route::get('api/crip-tree', '\Crip\Filesys\App\Controllers\TreeController');
    Route::get('/', '\Crip\Filesys\App\Controllers\ManagerController');
});