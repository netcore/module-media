<?php

namespace Modules\Media\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Models\Menu;
use Modules\Admin\Models\MenuItem;

class MediaDatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $menus = [
            'leftAdminMenu' => [
                [
                    'name'       => 'Media manager',
                    'icon'       => 'fa-folder',
                    'type'       => 'url',
                    'value'      => 'javascript:;',
                    'module'     => 'Media',
                    'is_active'  => 1,
                    'parameters' => json_encode([]),
                ],
            ]
        ];

        foreach ($menus as $name => $items) {
            $menu = Menu::firstOrCreate([
                'name' => $name
            ]);


            foreach ($items as $item) {
                $item['menu_id'] = $menu->id;
                MenuItem::firstOrCreate(array_except($item, 'children'));
            }
        }
    }
}
