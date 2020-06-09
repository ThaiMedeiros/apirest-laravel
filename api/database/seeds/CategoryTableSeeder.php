<?php

use Illuminate\Database\Seeder;
use App\Models\CategoryModel;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create categories using factory
        factory(Category::class, 20)->create();
    }
}
