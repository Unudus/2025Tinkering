<?php

namespace Database\Factories;

use App\Enums\CredentialType;
use App\Models\Credential;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Credential>
 */
class CredentialFactory extends Factory
{
    /** @var class-string<Model> */
    protected $model = Credential::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'type' => ['type' => CredentialType::Bearer_auth, 'prefix' => 'Bearer'],
            'value' => fake()->uuid(),
            'user_id' => User::factory()
        ];
    }
}
