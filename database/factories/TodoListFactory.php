<?php

namespace Database\Factories;

use App\Models\TodoList;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoListFactory extends Factory
{
    protected $model = TodoList::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'user_id' => UserFactory::new(),
            'group_id' => null,
            'is_favourite' => false,
        ];
    }
}
