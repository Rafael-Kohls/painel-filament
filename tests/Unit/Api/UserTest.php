<?php declare(strict_types=1);

namespace Tests\Unit\Api;

use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_existe_usuarios_na_listagem(): void
    {
        $limit = 2;
        $endpoint = sprintf('api/user/index', $limit);

        $response = $this->get($endpoint);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'message',
            'data'
        ]);

        $data = $response->json('data');
        // Garante que é uma matriz
        $this->assertIsArray($data);
        // Garante que é verdadeiro quando existir apenas 2 registros
        // Alterado para garantir que é verdadeiro quando existir mais que 1 
        $this->assertTrue(count($data) > 1);

        foreach ($data as $datum) {
            $this->assertIsString($datum['name']);
            // $this->assertTrue(filter_var($datum['email'], FILTER_VALIDATE_EMAIL));
            $this->assertTrue(!isset($datum['password']));
        }
    }

    public function test_procura_usuario_por_id(): void
    {
        // colocar um ID de um usuário válido no database
        $id = 3;
        $endpoint = sprintf('api/user/%s/show', $id);


        $response = $this->get($endpoint);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'message',
            'data'
        ]);

        $data = $response->json('data');
        $this->assertIsArray($data);

        $this->assertIsString($data['name']);
        // $this->assertTrue(filter_var($data['email'], FILTER_VALIDATE_EMAIL));
        $this->assertTrue(!isset($data['password']));
    }

    public function test_usuario_nao_encontrado(): void
    {
        $id = Str::uuid()->toString();
        $endpoint = sprintf('api/user/%s/show', $id);

        $response = $this->get($endpoint);

        $response->assertStatus(404);
        $response->assertJsonStructure([
            'status',
            'message',
            'data'
        ]);

        $data = $response->json('data');
        $this->assertEmpty($data);
    }


    public function test_cria_novo_usuario(): void
    {
        $fake = Factory::create();

        $pass = '123';
    
        $data = [
            'name' => $fake->name,
            'email' => $fake->email,
            'password' => $pass,
            'password_confirmation' => $pass,
            'group' => 'ADMIN'
        ];
    
        $endpoint = 'api/user/store';
        $response = $this->postJson($endpoint, $data);
    
        // dd($response);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'status',
            'message',
            'data'
        ]);
    }
    

    public function test_email_unico(): void
    {
        $fake = Factory::create();
        $email = 'teste_email_unico2@gmail.com';
        User::whereEmail($email)->delete();
        $pass = '123';

        $data = [
            'name' => $fake->name,
            'email' => $email,
            'password' => $pass,
            'password_confirmation' => $pass,
            'group' => 'ADMIN'
        ];

        $endpoint = 'api/user/store';
        $response = $this->postJson($endpoint, $data);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'status',
            'message',
            'data'
        ]);

        $response = $this->postJson($endpoint, $data);
        $response->assertStatus(422);
    }


}
