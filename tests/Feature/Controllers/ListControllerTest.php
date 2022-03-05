<?php

namespace Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use Database\Factories\UserFactory;
use Database\Factories\TodoListFactory;

class ListControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_gust_can_not_get_list()
    {
        TodoListFactory::new()->create(['user_id' => 2]);
        TodoListFactory::new()->create(['user_id' => 2]);

        $this->getJson('api/lists')
            ->assertJson([
                "message" => "Unauthenticated.",
            ])
            ->assertStatus(401);
    }

    public function test_user_can_get_there_list()
    {
        $user1 = UserFactory::new()->create();
        $user2 = UserFactory::new()->create();

        TodoListFactory::new()->create([
            'user_id' => 1,
            'name' => 'Home',
        ]);
        TodoListFactory::new()->create(['user_id' => 2]);
        TodoListFactory::new()->create(['user_id' => 2]);
        TodoListFactory::new()->create(['user_id' => 2]);

        Sanctum::actingAs($user1);

        $this->getJson('api/lists')
            ->assertJsonCount(1, 'data')
            ->assertJson([
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Home',
                        'group_id' => null,
                        'is_favourite' => false,
                    ]
                ]
            ])
            ->assertSuccessful();

    }
}
