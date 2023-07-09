<?php

namespace Database\Factories;

use App\Models\Offer;
use App\Models\OfferItem;
use Illuminate\Database\Eloquent\Factories\Factory;


class OfferFactory extends Factory
{

    protected $model = Offer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $avatar = $this->faker->randomElement(['ava1.png', 'ava2.jpg', 'ava3.jpg']);
        $status = $this->faker->randomElement(['N', 'S', 'V']);  // New | Sent | Viewed

        return [
            'guid' => $this->faker->uuid(),
            'b24_contact_id' => $this->faker->numberBetween(1, 100),
            'b24_deal_id' => $this->faker->numberBetween(1, 100),
            'b24_manager_id' => $this->faker->numberBetween(1, 100),
            'manager_fio' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'position' => 'Специалист отдела продаж', //должность
            'avatar'=> $avatar,
            'date_end' => $this->faker->dateTimeThisYear(),
            'status'=> $status
        ];
    }
}
