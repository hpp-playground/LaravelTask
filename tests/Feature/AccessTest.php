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

    //TODOs phase1, 1

    /**
    * @test
    */
    public function canAccessApiProductsByGET()
    {
        $response = $this->get('api/products');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function canAccessApiProductsByPOST()
    {
        $response = $this->post('api/products');
        $response->assertStatus(200);
    }


    /**
    * @test
    */
    public function canAccessApiProductsProduct_idByGET()
    {
        $response = $this->get('api/products/1');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function canAccessApiProductsProduct_idByPUT()
    {
        $response = $this->put('api/products/1');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function canAccessApiProductsProduct_idByDELETE()
    {
        $response = $this->delete('api/products/1');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function canAccessApiShopsByGET()
    {
        $response = $this->get('api/shops');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function canAccessApiShopsWithByPOST()
    {
        $response = $this->post('api/shops');
        $response->assertStatus(200);
    }


    /**
    * @test
    */
    public function canAccessApiShopsShop_idByGET()
    {
        $response = $this->get('api/shops/1');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function canAccessApiShopsShop_idByPUT()
    {
        $response = $this->put('api/shops/1');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function canAccessApiShopsShop_idByDELETE()
    {
        $response = $this->delete('api/shops/1');
        $response->assertStatus(200);
    }

    //TODOs phase1, 4
    //Product
    /**
    * @test
    */
    public function responseFromApiProductsByGETIsJSON()
    {
        $response = $this->get('api/products');
        $this->assertThat($response->content(), $this->isJson());
    }

    /**
    * @test
    */
    public function JSONFromApiProductsByGETSatisfyRequirements()
    {
        $response = $this->get('api/products');
        $products = $response->json();
        $product = $products[0];
        $this->assertSame(['id', 'title', 'description', 'price'], array_keys($product));
    }

    /**
    * @test
    */
    public function ProductsCountFromApiProductsByGETIs10()
    {
        $response = $this->get('api/products');
        $response->assertJsonCount(10);
    }


    //Shop

    /**
    * @test
    */
    public function responseFromApiShopsByGETIsJSON()
    {
        $response = $this->get('api/shops');
        $this->assertThat($response->content(), $this->isJson());
    }

    /**
    * @test
    */
    public function JSONFromApiShopsByGETSatisfyRequirements()
    {
        $response = $this->get('api/shops');
        $shops = $response->json();
        $shop = $shops[0];
        $this->assertSame(['id', 'name'], array_keys($shop));
    }


    /**
    * @test
    */
    public function ProductsCountFromApiShopsByGETIs5()
    {
        $response = $this->get('api/shops');
        $response->assertJsonCount(5);
    }

}
