# Installation

`composer required netcore/module-media`

Publish assets by firing this command

`php artisan module:publish Media`

Publish configuration

`php artisan module:publish-config Media`

You need to create symlink to your public storage

On windows (remember to run cmd as administrator): 

`mklink /D path\to\laravel\project\public\storage path\to\laravel\project\storage\app`

On Linux: 
`ln -sf path/to/laravel/project/storage/app path/to/laravel/project/public/storage`

# Usage
To add media manager to your summernote text editor. Add `summernote-with-filemanager` class to your textarea input.
