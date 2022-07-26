<?php

namespace Database\Seeders;

use App\Models\PageContent;
use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PageContent::create(['page' => 'Home', 'content' => '{}']);
        PageContent::create(['page' => 'AboutUs', 'content' => '{}']);
        PageContent::create(['page' => 'ContactDetails', 'content' => '{}']);
        PageContent::create(['page' => 'Links', 'content' => '{}']);
    }
}
