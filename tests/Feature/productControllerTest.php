<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class productControllerTest extends TestCase
{
    private $defaultRoute = 'api/products';

    public function test_product_index_paginator()
    {
        $product = Product::factory()->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->get($this->defaultRoute)
                         ->assertStatus(200)
                        ->assertJsonStructure([
                            'current_page',
                            'data',
                            'first_page_url',
                            'from',
                            'last_page',
                            'last_page_url',
                            'links',
                            'next_page_url',
                            'path',
                            'per_page',
                            'prev_page_url',
                            'to',
                            'total',
                        ]);
    }

    public function test_product_index_search_with_page()
    {
        $product = Product::factory()->create();

        $params = [
            'search' => $product->name,
        ];

        $user = User::factory()->create();

        $response = $this->actingAs($user)
                        ->get($this->defaultRoute . '?' . http_build_query($params))
                        ->assertStatus(200)
                        ->assertJsonCount(2, 'data');
    }
}
