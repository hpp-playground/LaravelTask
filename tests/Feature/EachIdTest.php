<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DB;
use \Illuminate\Http\Response;

class EachIdTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'TestDataSeeder']);
    }

    //TODO phase2, 1

    /**
    * @test
    */
    public function responseFromApiProductsProduct_idByGETIsJSON()
    {
        $id = DB::table('products')->max('id');
        $response = $this->get('api/products/'.$id);
        $this->assertThat($response->content(), $this->isJson());
    }

    /**
    * @test
    */
    public function JSONFromApiProductsProduct_idByGETSatisfyRequirements()
    {
        $id = DB::table('products')->max('id');
        $response = $this->get('api/products/'.$id);
        $product = $response->json();
        $this->assertSame(['title', 'description','price'], array_keys($product));
    }

    /**
    * @test
    */
    public function canChangeIdxOfProductToAccessApiProductsProduct_idByPUT()
    {
        $params = [
            'title' => '四ツ矢ナノダー',
        ];
        $id = DB::table('products')->max('id');
        $response = $this->putJson('api/products/'.$id, $params);
        $this->assertEquals('四ツ矢ナノダー', \App\Product::find($id)->title);
    }

    /**
    * @test
    */
    public function canDeleteIdxOfProductToAccessApiProductsProduct_idByDELETE()
    {
        $id = DB::table('products')->max('id');
        $response = $this->delete('api/products/'.$id);
        $this->assertFalse(DB::table('products')->where('id', $id)->exists());
    }

    /**
    * @test
    */
    public function responseFromApiShopsShop_idByGETIsJSON()
    {
        $id = DB::table('shops')->max('id');
        $response = $this->get('api/shops/'.$id);
        $this->assertThat($response->content(), $this->isJson());
    }

    /**
    * @test
    */
    public function JSONFromApiShopsShop_idByGETSatisfyRequirements()
    {
        $id = DB::table('shops')->max('id');
        $response = $this->get('api/shops/'.$id);
        $shop = $response->json();
        $this->assertSame(['name'], array_keys($shop));
    }

    /**
    * @test
    */
    public function canChangeIdxOfShopToAccessApiShopsShop_idByPUT()
    {
        $params = [
            'name' => '渋山109',
        ];
        $id = DB::table('shops')->max('id');
        $response = $this->putJson('api/shops/'.$id, $params);
        $this->assertEquals('渋山109', \App\Shop::find($id)->name);
    }

    /**
    * @test
    */
    public function canDeleteIdxOfShopToAccessApiShopsShop_idByDELETE()
    {
        $id = DB::table('shops')->max('id');
        $response = $this->delete('api/shops/'.$id);
        $this->assertFalse(DB::table('shops')->where('id', $id)->exists());
    }

    //TODO phase2, 2

    /**
    * @test
    */
    public function thereIsNoResouceOnApiProductsProduct_idAndReturn404ByGET()
    {
        $id = DB::table('products')->max('id') + 1;
        $response = $this->get('api/products/'.$id);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    /**
    * @test
    */
    public function thereIsNoResouceOnApiProductsProduct_idAndReturn404ByPUT()
    {
        $id = DB::table('products')->max('id') + 1;
        $params = [
            'title' => 'not found?',
        ];
        $response = $this->putJson('api/products/'.$id, $params);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    /**
    * @test
    */
    public function thereIsNoResouceOnApiProductsProduct_idAndReturn404ByDELETE()
    {
        $id = DB::table('products')->max('id') + 1;
        $response = $this->delete('api/products/'.$id);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    /**
    * @test
    */
    public function thereIsNoResouceOnApiShopsShop_idAndReturn404ByGET()
    {
        $id = DB::table('shops')->max('id') + 1;
        $response = $this->get('api/shops/'.$id);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    /**
    * @test
    */
    public function thereIsNoResouceOnApiShopsShop_idAndReturn404ByPUT()
    {
        $id = DB::table('shops')->max('id') + 1;
        $params = [
            'title' => 'not found?',
        ];
        $response = $this->putJson('api/shops/'.$id, $params);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    /**
    * @test
    */
    public function thereIsNoResouceOnApiShopsShop_idAndReturn404ByDELETE()
    {
        $id = DB::table('shops')->max('id') + 1;
        $response = $this->delete('api/shops/'.$id);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

}
