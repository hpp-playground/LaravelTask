<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccessTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'TestDataSeeder']);
    }

    /**
    * @test
    */
    public function api_productsにGETメソッドでアクセスできる()
    {
        $response = $this->get('api/products');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function api_productsにPOSTメソッドでアクセスできる()
    {
        $response = $this->post('api/products');
        $response->assertStatus(200);
    }


    /**
    * @test
    */
    public function api_products_product_idにGETメソッドでアクセスできる()
    {
        $response = $this->get('api/products/1');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function api_products_product_idにPUTメソッドでアクセスできる()
    {
        $response = $this->put('api/products/1');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function api_products_product_idにDELETEメソッドでアクセスできる()
    {
        $response = $this->delete('api/products/1');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function api_shopsにGETメソッドでアクセスできる()
    {
        $response = $this->get('api/shops');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function api_shopsにPOSTメソッドでアクセスできる()
    {
        $response = $this->post('api/shops');
        $response->assertStatus(200);
    }


    /**
    * @test
    */
    public function api_shops_shop_idにGETメソッドでアクセスできる()
    {
        $response = $this->get('api/shops/1');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function api_shops_shop_idにPUTメソッドでアクセスできる()
    {
        $response = $this->put('api/shops/1');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function api_shops_shop_idにDELETEメソッドでアクセスできる()
    {
        $response = $this->delete('api/shops/1');
        $response->assertStatus(200);
    }

}
