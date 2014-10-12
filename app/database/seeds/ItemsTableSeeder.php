<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ItemsTableSeeder extends Seeder
{

    public function run() {
        $faker    = Faker::create();
        $users    = User::all()->toArray();
        $cities   = City::all()->toArray();
        $units    = ['мм', 'мл', 'штука', 'кг', 'каюта', 'человек'];
        $params   = Params::all()->toArray();
        $compares = ItemCompares::all()->toArray();


        //------------------------------------------------------------------------------
        // Реальные кейсы количественная
        //------------------------------------------------------------------------------
        //------------------------------------------------------------------------------
        // Количественный тип
        //------------------------------------------------------------------------------
        $item = Items::create([
            'user_id'     => 1,
            'city_id'     => $cities[array_rand($cities)]['id'],
            'type_id'     => 1,
            'tracker'     => md5(microtime()),
            'name'        => '100 iPhone 6 по оптовой цене',
            'unit'        => 'штука',
            'description' => 'Здравствуйте. У меня есть возможность купить iPhone по оптовой стоимости, для этого объем единовременной покупки должен составить 100 штук. Ищу единомышленников. Срочно!',
        ]);

        // Максимальное количество
        ItemsParams::create([
            'item_id'    => $item->id,
            'param_id'   => 4,
            'compare_id' => 2,
            'value'      => 100,
        ]);

        // Стоимость
        ItemsParams::create([
            'item_id'    => $item->id,
            'param_id'   => 1,
            'compare_id' => 3,
            'value'      => '25000'
        ]);

        // Изображение
        $picture = Pictures::create([
            'name'        => $faker->word,
            'path'        => '1.jpg',
            'description' => 'iPhone'
        ]);

        ItemPictures::create([
            'item_id'    => $item->id,
            'picture_id' => $picture->id
        ]);


        $item = Items::create([
            'user_id'     => 1,
            'city_id'     => $cities[array_rand($cities)]['id'],
            'type_id'     => 1,
            'tracker'     => md5(microtime()),
            'name'        => 'Круиз в Стокгольм',
            'unit'        => 'каюта',
            'description' => 'Всем привет, хочу отправится в путешествие по Европе. Ищу попутчиков для поездки в стокгольм. Тур предусматривает четверых участников.',
        ]);

        // Максимальное количество
        ItemsParams::create([
            'item_id'    => $item->id,
            'param_id'   => 4,
            'compare_id' => 2,
            'value'      => 4,
        ]);

        // Стоимость
        ItemsParams::create([
            'item_id'    => $item->id,
            'param_id'   => 1,
            'compare_id' => 3,
            'value'      => '5000'
        ]);

        // Изображение
        $picture = Pictures::create([
            'name'        => $faker->word,
            'path'        => '2.jpg',
            'description' => 'Стокгольм'
        ]);

        ItemPictures::create([
            'item_id'    => $item->id,
            'picture_id' => $picture->id
        ]);



        //------------------------------------------------------------------------------
        // Реальные кейсы cоставной тип
        //------------------------------------------------------------------------------
        $item = Items::create([
            'user_id'     => 1,
            'city_id'     => $cities[array_rand($cities)]['id'],
            'type_id'     => 2,
            'tracker'     => md5(microtime()),
            'name'        => 'Одежда из Гонконга',
            'unit'        => 'кг',
            'description' => 'Всем привет. Регулярно привожу вещи из Гонконга. Миинимальный вес 20кг, но больше 100кг доставить не смогу. Жду участников.',
        ]);


        // генерим разное количество параметров

            ItemsParams::create([
                'item_id'    => $item->id,
                'param_id'   => 2,
                'compare_id' => 1,
                'value'      => 20,
            ]);

            ItemsParams::create([
                'item_id'    => $item->id,
                'param_id'   => 2,
                'compare_id' => 2,
                'value'      => 100,
            ]);

            ItemsParams::create([
                'item_id'    => $item->id,
                'param_id'   => 1,
                'compare_id' => 2,
                'value'      => 100000,
            ]);



        // Изображение
        $picture = Pictures::create([
            'name'        => $faker->word,
            'path'        => '3.jpg',
            'description' => $faker->paragraph()
        ]);

        ItemPictures::create([
            'item_id'    => $item->id,
            'picture_id' => $picture->id
        ]);




        foreach (range(1, 54) as $index) {
            //------------------------------------------------------------------------------
            // Количественный тип
            //------------------------------------------------------------------------------
            $item = Items::create([
                'user_id'     => 1,
                'city_id'     => $cities[array_rand($cities)]['id'],
                'type_id'     => 1,
                'tracker'     => md5(microtime()),
                'name'        => $faker->word,
                'unit'        => $units[array_rand($units)],
                'description' => $faker->paragraph(),
            ]);

            // Максимальное количество
            ItemsParams::create([
                'item_id'    => $item->id,
                'param_id'   => 4,
                'compare_id' => 2,
                'value'      => $faker->numberBetween(1, 20),
            ]);

            // Стоимость
            ItemsParams::create([
                'item_id'    => $item->id,
                'param_id'   => 1,
                'compare_id' => 3,
                'value'      => $faker->randomFloat(2, 0)
            ]);

            // Изображение
            $picture = Pictures::create([
                'name'        => $faker->word,
                'path'        => basename($faker->image(public_path('upload/img/'), 200, 200)),
                'description' => $faker->paragraph()
            ]);

            ItemPictures::create([
                'item_id'    => $item->id,
                'picture_id' => $picture->id
            ]);


            //------------------------------------------------------------------------------
            // Составной тип
            //------------------------------------------------------------------------------
            $item = Items::create([
                'user_id'     => 1,
                'city_id'     => $cities[array_rand($cities)]['id'],
                'type_id'     => 2,
                'tracker'     => md5(microtime()),
                'name'        => $faker->word,
                'unit'        => $units[array_rand($units)],
                'description' => $faker->paragraph(),
            ]);


            // генерим разное количество параметров
            for($i=0; $i < rand(1, count($params)); $i++) {
                ItemsParams::create([
                    'item_id'    => $item->id,
                    'param_id'   => $params[$i]['id'],
                    'compare_id' => $compares[array_rand($compares)]['id'],
                    'value'      => $faker->numberBetween(10, 100),
                ]);
            }


            // Изображение
            $picture = Pictures::create([
                'name'        => $faker->word,
                'path'        => basename($faker->image(public_path('upload/img/'), 200, 200)),
                'description' => $faker->paragraph()
            ]);

            ItemPictures::create([
                'item_id'    => $item->id,
                'picture_id' => $picture->id
            ]);
        }
    }

}