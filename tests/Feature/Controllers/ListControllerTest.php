<?php

namespace Controllers;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ListControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_get_there_list()
    {
//        Sanctum::actingAs();
    }
}
