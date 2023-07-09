<?php

namespace Database\Factories;

use App\Models\Offer;
use App\Models\OfferItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferItemFactory extends Factory
{

    protected $model = OfferItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $img_array = [];
        $flats = ['flat1.jpg','flat2.jpg','flat3.jpg','flat4.jpg','flat5.jpg'];
        foreach (range(1, rand(2, 6)) as $elem) {
            $img_array[] = $this->faker->randomElement($flats);
        }

        return [
            'offer_id' => Offer::factory(),
            'cid' => $this->faker->uuid(),
            'type' => 'Евродвушка',
            'square' => $this->faker->randomFloat(2, 20, 100),
            'complex' => ('Да.Квартал Республика'),
            'house' => 'ГП-2',
            'description' => $this->faker->numerify('Описание квартиры - ###'),
            'images' => json_encode($img_array),
            'like' => $this->faker->boolean(),
            'price' => $this->faker->numberBetween(1000000,99000000)
        ];
    }
}

