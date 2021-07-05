<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoTest extends TestCase
{
    /*TESTES UNITÁRIOS DA API REST*/

    public function testApplication()
    {
        //Verificar se a aplicação está online
        $response = $this->json('GET', '/');
        $response->assertStatus(200);
    }

    public function testListTodoAPI()
    {
        //Teste da Rota para listar as tarefas
        $response = $this->json('GET', 'api/todos');
        $response->assertStatus(200);
        $response->assertJson(['type' => 'success']);
    }

    public function testCreateTodoAPI()
    {
        //Teste da Rota para criar uma tarefa
        $response = $this->json('POST', 'api/todos', ['description' => 'Teste unitário', 'status' => '0']);
        $response->assertStatus(200);
        $response->assertJson(['type' => 'success']);
    }

    public function testUpdateTodoAPI()
    {
        //Teste da Rota para atualizar uma tarefa
        $response = $this->json('PUT', 'api/todos/1', ['status' => '1']);
        $response->assertStatus(200);
    }

    public function testDeleteTodoAPI()
    {
        //Teste da Rota para deletar uma tarefa
        $response = $this->json('DELETE', 'api/todos/1');
        $response->assertStatus(200);
    }
}