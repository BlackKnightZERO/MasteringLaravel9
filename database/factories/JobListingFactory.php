<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobListing>
 */
class JobListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence( rand(5, 7) );
        $dateTime = $this->faker->dateTimeBetween('-1 month', 'now');

        $content = '';
        for( $i = 0; $i < 5; $i++ ) {
            $content .= '<p class="mb-4">'.$this->faker->sentence( rand(5, 10), true ).'</p>';
        }

        return [
            'user_id'   => User::factory(),
            'title'     => $title,
            'slug'      => Str::of($title)->slug('-') .'-'.  rand(1111,9999),
            'company'   => $this->faker->company,
            'logo'      => null,
            'location'  => $this->faker->city,
            'content'   => $content,
            'is_active' => true,
            'is_highlighted' => ( rand(1,9) > 7 ),
            'apply_link' => 'https://ca.indeed.com/',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ];
    }
}
