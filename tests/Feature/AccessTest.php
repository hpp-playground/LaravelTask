<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use DB;
use \Illuminate\Http\Response;

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
        $params = [
            'title' => 'title',
            'description' => 'description',
            'price' => 100,
            'image' => UploadedFile::fake()->image('test.jpg'),
        ];
        $response = $this->postJson('api/products', $params);
        $response->assertStatus(302);
    }


    /**
    * @test
    */
    public function canAccessApiProductsProduct_idByGET()
    {
        $id = DB::table('products')->max('id');
        $response = $this->get('api/products/'.$id);
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function canAccessApiProductsProduct_idByPUT()
    {
        $id = DB::table('products')->max('id');
        $params = [
            'title' => 'title',
        ];
        $response = $this->putJson('api/products/'.$id, $params);
        $response->assertStatus(302);
    }

    /**
    * @test
    */
    public function canAccessApiProductsProduct_idByDELETE()
    {
        $id = DB::table('products')->max('id');
        $response = $this->delete('api/products/'.$id);
        $response->assertStatus(302);
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
        $params = [
            'name' => 'name',
            'image' => UploadedFile::fake()->image('test.jpg'),
        ];
        $response = $this->postJson('api/shops', $params);
        $response->assertStatus(302);
    }


    /**
    * @test
    */
    public function canAccessApiShopsShop_idByGET()
    {
        $id = DB::table('shops')->max('id');
        $response = $this->get('api/shops/'.$id);
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function canAccessApiShopsShop_idByPUT()
    {
        $id = DB::table('shops')->max('id');
        $params = [
            'name' => 'name'
        ];
        $response = $this->putJson('api/shops/'.$id, $params);
        $response->assertStatus(302);
    }

    /**
    * @test
    */
    public function canAccessApiShopsShop_idByDELETE()
    {
        $id = DB::table('shops')->max('id');
        $response = $this->delete('api/shops/'.$id);
        $response->assertStatus(302);
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
        $this->assertSame(['id', 'title', 'description', 'price', 'imageUrl'], array_keys($product));
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
        $this->assertSame(['id', 'name','imageUrl'], array_keys($shop));
    }


    /**
    * @test
    */
    public function ProductsCountFromApiShopsByGETIs5()
    {
        $response = $this->get('api/shops');
        $response->assertJsonCount(5);
    }


    //TODOs phase1, 5
    /**
    * @test
    */

    /*
    public function canAddDataIntoProductsTableToAccessApiProductsByPOST()
    {
        $params = [
            'title' => 'コラコーカ',
            'description' => 'おいしい飲み物',
            'price' => 430,
        ];
        $this->postJson('api/products', $params+$imageParam);
        $this->assertDatabaseHas('products', $params);
    }
    */


    /**
    * @test
    */
    public function canAddDataIntoShopsTableToAccessApiShopsByPOST()
    {
        $params = [
            'name' => 'PARGO',
        ];
        $this->postJson('api/shops', $params);
        $this->assertDatabaseHas('shops', $params);
    }


    //TODOs phase1, 6

    /**
    * @test
    */
    public function responseFromApiProductsWithoutTitleIs422ByPOST()
    {
        $params = [
            'description' => 'おいしい虚無',
            'price' => 0,
        ];
        $response = $this->postJson('api/products', $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
    * @test
    */
    public function responseFromApiProductsWithoutDescriptionIs422ByPOST()
    {
        $params = [
            'title' => 'おーいコブ茶',
            'price' => 0,
        ];
        $response = $this->postJson('api/products', $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
    * @test
    */
    public function responseFromApiProductsWithoutPriceIs422ByPOST()
    {
        $params = [
            'title' => '雨水',
            'description' => 'プライスレス',
        ];
        $response = $this->postJson('api/products', $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
    * @test
    */
    public function responseFromApiProductsWithoutAllIs422ByPOST()
    {
        $params = [];
        $response = $this->postJson('api/products', $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
    * @test
    */
    public function responseFromApiShopsWithoutNameIs422ByPOST()
    {
        $params = [];
        $response = $this->postJson('api/shops', $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }


}

