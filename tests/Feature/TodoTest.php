<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoTest extends TestCase
{
    public function testTodoApplication()
    {
        $response = $this->json('GET', '/');
        $response->assertStatus(200);
    }

    public function testRouteListTodoAPI()
    {
        $response = $this->json('GET', 'api/todos');
        $response->assertStatus(200);
        $response->assertJson(['type' => 'success']);
    }

    public function testRouteCreateTodoAPI()
    {
        $response = $this->json('POST', 'api/todos', ['description' => 'Teste unitário', 'status' => '0']);
        $response->assertStatus(200);
        $response->assertJson(['type' => 'success']);
    }

    public function testRouteUpdateTodoAPI()
    {
        $response = $this->json('PUT', 'api/todos/1', ['status' => '1']);
        $response->assertStatus(200);
    }

    public function testRouteDeleteTodoAPI()
    {
        $response = $this->json('DELETE', 'api/todos/1');
        $response->assertStatus(200);
    }
}