<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $my_faker = $this->faker;
        $catsid =  Category::where('id', '>', 0)->pluck('id');
        $price =  $my_faker->numberBetween($min = 500, $max = 9000);
        $last_price = $price + round($price * 0.2);
        $products =  array(
            'https://i.ebayimg.com/images/g/7I4AAOSwx-9gX9iv/s-l500.jpg',
            'https://i.ebayimg.com/images/g/5OgAAOSwfYRgU9tS/s-l500.png',
            'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80',
            'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Nnx8cHJvZHVjdHxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60',
            'https://images.unsplash.com/photo-1543512214-318c7553f230?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTV8fHByb2R1Y3R8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60',
            'https://images.unsplash.com/photo-1564466809058-bf4114d55352?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MzN8fHByb2R1Y3R8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60',
            'https://ae01.alicdn.com/kf/H3e60ae711bf54a00839617ca4e6d8293o/Smart-Watch-Bracelet-Wristband-Blood-Pressure-Fitness-Tracker-Heart-Rate-Band-M4-Smart-Band-Wristband-Pedometer.jpg_Q90.jpg_.webp',
            'https://ae01.alicdn.com/kf/Hf423d852c3e64abf9b8686832462411bR/3pcs-lot-Baby-Feeding-Creative-Suit-Waterproof-Edible-Silicone-Bib-Baby-Training-Free-BPA-Bowl-Cutlery.jpg_Q90.jpg_.webp',
            'https://i5.walmartimages.com/asr/f47db6be-595e-4d1e-9164-81e4146027e2.a47009f0e80ad3263da01dae873012ca.jpeg?odnWidth=408&odnHeight=408&odnBg=ffffff',
            'https://assets.adidas.com/images/w_840,h_840,f_auto,q_auto:sensitive,fl_lossy/b80dd0c12da7495cb692ac83008dd13b_9366/GL9500_41_detail.jpg',
            'https://i.ebayimg.com/images/g/aP0AAOSw~slcJ9ND/s-l1600.jpg',
            'https://i.ebayimg.com/images/g/h4oAAOSw3ZFf7OqP/s-l500.jpg',
            'https://i.ebayimg.com/images/g/~BUAAOSwl29b37CV/s-l500.jpg',

        );
        return [
            'title' =>  $my_faker->sentence(4),
            'description' =>  $my_faker->text(),
            'category_id' =>  $my_faker->randomElement($array =  $catsid),
            // 'image' => "https://loremflickr.com/640/360",
            'image' => $my_faker->randomElement($array =  $products),
            'price' => $price,
<<<<<<< HEAD
=======
            'last_price' =>  $last_price,
>>>>>>> 26ed73d867fa646e41b3a8e19a07783fc61689ff
            'solds' => $my_faker->numberBetween($min = 0, $max = 15),
            'quantity' => $my_faker->numberBetween($min = 3, $max = 30),
            'best_offers' => $my_faker->randomElement($array = array('0', '1'))
        ];
    
    }
}