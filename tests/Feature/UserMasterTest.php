<?php

namespace Tests\Feature;

use App\Models\UserMaster;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserMasterTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_users()
    {
        UserMaster::factory()->count(3)->create();

        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
        $response->assertViewHas('users');
    }

    public function test_create_form_is_accessible()
    {
        $response = $this->get(route('users.create'));

        $response->assertStatus(200);
    }

    public function test_user_can_be_stored()
    {
        $response = $this->post(route('users.store'), [
            'name'       => 'テストユーザー',
            'email'      => 'test@example.com',
            'department' => '開発部',
            'role'       => 'user',
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users_master', ['email' => 'test@example.com']);
    }

    public function test_user_can_be_updated()
    {
        $user = UserMaster::factory()->create();

        $response = $this->put(route('users.update', $user->id), [
            'name'       => '更新後の名前',
            'email'      => $user->email,
            'department' => '営業部',
            'role'       => 'admin',
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users_master', ['name' => '更新後の名前']);
    }

    public function test_user_can_be_deleted()
    {
        $user = UserMaster::factory()->create();

        $response = $this->delete(route('users.destroy', $user->id));

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseMissing('users_master', ['id' => $user->id]);
    }

    public function test_store_validates_required_fields()
    {
        $response = $this->post(route('users.store'), []);

        $response->assertSessionHasErrors(['name', 'email', 'role']);
    }
}
