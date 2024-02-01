<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Repositories\FilmsRepository;
use App\Models\Films;

class FilmsTest extends TestCase
{

    use DatabaseTransactions;
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        $response = new FilmsRepository(new Films);
        $response->paginate();
        $this->assertNotNull($response);
    }

    public function test_edit(): void{
        $response = new FilmsRepository(new Films);
        $response->find(1);
        $this->assertNotNull($response);
    }

    public function test_update(): void{
        $response = new FilmsRepository(new Films);
        $response->find(1);
        $this->assertNotNull($response);

        $input = [
            'titre' => 'Test update' 
        ];
        $response->update(1,$input);
        $this->assertDatabaseHas('films', $input);
    }

    public function test_delete(): void{
        $response = new FilmsRepository(new Films);
        $response->find(1);
        $this->assertNotNull($response);
        $response->delete(1);
    }
    public function test_store(): void{
        $response = new FilmsRepository(new Films);
        $now = \Carbon\Carbon::now();
        $input = [
            'titre' => 'Alias',
            'description' => 'Alias serie',
            'reference' => '3_'.$now,
            'categorie_id' => 4,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        $response->create($input);
        $this->assertDatabaseHas('films', $input);
    }
}
