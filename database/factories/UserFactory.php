<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'        => 'admin',
            'last_name'         => 'admin',
            'is_owner'          => 1,
            'phone'             => '7894561230',
            'email'             => 'owner@irvine.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$GRUIDyTsoMpsfs2Eko9aFOLEINOIjZi/AJNIv20C0AnGTmVWBo.ha', // 123456
            'remember_token'    => Str::random(10),
        ];
    }
}
