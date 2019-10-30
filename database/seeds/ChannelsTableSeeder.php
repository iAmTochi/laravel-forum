<?php

use Illuminate\Database\Seeder;
use LaravelForum\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Laravel 5.8',
            'slug' => str_slug('Laravel 5.8')
        ]);

        Channel::create([
            'name' => 'Vue Js 3',
            'slug' => str_slug('Vue Js 3')
        ]);

        Channel::create([
            'name' => 'Angular 7',
            'slug' => str_slug('Angular 7')
        ]);

        Channel::create([
            'name' => 'Node js',
            'slug' => str_slug('Node js')
        ]);


    }
}
