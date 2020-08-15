<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $categoryList = [
            [
                'name' => 'Supermarket',
                'parent_id' => '0',
            ],
            [
                'name' => 'Food Cupboard',
                'parent_id' => '1',
            ],
            [
                'name' => 'Grains & Rice',
                'parent_id' => '2',
                'link'=>'https://www.jumia.com.eg/grains-rice/'
            ],
            [
                'name' => 'Cooking Ingredients',
                'parent_id' => '2',
                'link'=>'https://www.jumia.com.eg/cooking-ingredients/'
            ],
            [
                'name' => 'Fashion',
                'parent_id' => '0',
            ],
            [
                'name' => 'Women\'s Fashion',
                'parent_id' => '5',
            ],
            [
                'name' =>'Women\'s Accessories',
                'parent_id' => '6',
                'link'=>'https://www.jumia.com.eg/womens-fashion-accessories/'
            ],
            [
                'name' => 'Jewelry',
                'parent_id' => '6',
                'link'=>'https://www.jumia.com.eg/womens-jewelry/'
            ],

            [
                'name' => 'Health & Beauty',
                'parent_id' => '0',
            ],
            [
                'name' => 'Beauty & Personal Care',
                'parent_id' => '9',
            ],
            [
                'name' => 'Hair Care',
                'parent_id' => '10',
                'link'=>'https://www.jumia.com.eg/womens-fashion-accessories/'
            ],
            [
                'name' => 'Makeup',
                'parent_id' => '10',
                'link'=>'https://www.jumia.com.eg/womens-jewelry/'
            ]    
        ];

        foreach ( $categoryList as $cat){
            App\Models\Catergory::insert(
                $cat
        
            );
        }
    }
}
