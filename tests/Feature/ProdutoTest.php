<?php

namespace Tests\Feature;

use App\Models\Produto;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProdutoTest extends TestCase
{
    use RefreshDatabase;

    private function getJwtToken()
    {
        // Crie um usuário no banco de dados para o teste
        $user = User::factory()->create([
            'email' => 'email@example.com',
            'password' => bcrypt('password'),
        ]);

        // Faça a requisição para o endpoint de login para obter o token
        $response = $this->post('/api/auth/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200);

        // Certifique-se de que o token existe na resposta
        return $response['token'];
    }

    public function testListarProdutos()
    {
        $token = $this->getJwtToken(); // Obtenha o token JWT

        // Criar 5 produtos de teste
        Produto::factory()->count(5)->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('/api/produtos');

        $response->assertStatus(200);
        $response->assertJsonCount(5); // Verifica se há 5 produtos na resposta
    }

    public function testBuscarProdutoPorId()
    {
        $token = $this->getJwtToken(); // Obtenha o token JWT

        // Criar um produto de teste
        $produto = Produto::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('/api/produtos/' . $produto->id);

        $response->assertStatus(200);
        $response->assertJson(['id' => $produto->id]); // Verifica se o produto retornado tem o mesmo ID
    }
}

