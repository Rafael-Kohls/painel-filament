<?php declare(strict_types=1);

namespace Tests\Feature;

use App\Filament\Resources\UserResource;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class UserResourceTest extends TestCase
{

    // public function test_pagina_lista_usuarios(): void
    // {
    //     $this->get(UserResource::getUrl())->assertSuccessful();
    // }

    // public function test_lista_usuarios(): void
    // {
    //     $users = User::factory()->count(3)->create();
    //     Livewire::test(ListUsers::class)
    //         ->assertSee($users->pluck('email')->toArray());
    // }

    // public function test_pagina_criar_usuario(): void
    // {
    //     $this->get(UserResource::getUrl('create'))->assertSuccessful();
    // }

    // public function test_cria_novo_usuario()
    // {
    //     // Arrange
    //     $newUser = User::factory()->make();

    //     // Act
    //     Livewire::test(CreateUser::class)
    //         // Setting the orm value
    //         ->set('data.name', $newUser->name)
    //         ->set('data.email', $newUser->email)
    //         ->set('data.password', $newUser->password)
    //         ->set('data.group', 'ADMIN')
    //         // Trying to hook the data store mechanism
    //         ->call('create')
    //         ->assertHasNoErrors();

    //     // Assert
    //     $this->assertDatabaseHas('users', [
    //         'name' => $newUser->name,
    //         'email' => $newUser->email,
    //         'password' => $newUser->password,
    //         'group' => 'ADMIN',
    //     ]);
    // }

}
