<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    public $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_en' => $this->faker->title,
            'name_ru' => $this->faker->title,
            'name_uz' => $this->faker->title,
            // 'subcategory_id' => function (array $attributes) {
            //     return SubCategory::find($attributes['subcategory_id'])->id;
            // },
            'subcategory_id' => 11,
            'text_en' => $this->faker->text,
            'text_ru' => $this->faker->text,
            'text_uz' => $this->faker->text,
            'price' => 5000,
            'photo' => Str::random(100),
            'model' => Str::random(10),
            'model_number' => Str::random(10),
            'place_origin' => Str::random(10),
            'material' => Str::random(10),
            'oem' => Str::random(10),
            'certification' => Str::random(10),
            'popular' => 1,
        ];
    }
}
