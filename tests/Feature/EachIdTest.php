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
        $this->assertSame(['id','title', 'description','price','imageUrl'], array_keys($product));
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
        $this->assertSame(['id','name'], array_keys($shop));
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
    public function ifThereIsNoResouceOnApiProductsProduct_idThenReturn404ByGET()
    {
        $id = DB::table('products')->max('id') + 1;
        $response = $this->get('api/products/'.$id);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    /**
    * @test
    */
    public function ifThereIsNoResouceOnApiProductsProduct_idThenReturn404ByPUT()
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
    public function ifThereIsNoResouceOnApiProductsProduct_idThenReturn404ByDELETE()
    {
        $id = DB::table('products')->max('id') + 1;
        $response = $this->delete('api/products/'.$id);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    /**
    * @test
    */
    public function ifThereIsNoResouceOnApiShopsShop_idThenReturn404ByGET()
    {
        $id = DB::table('shops')->max('id') + 1;
        $response = $this->get('api/shops/'.$id);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    /**
    * @test
    */
    public function ifThereIsNoResouceOnApiShopsShop_idThenReturn404ByPUT()
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
    public function ifThereIsNoResouceOnApiShopsShop_idThenReturn404ByDELETE()
    {
        $id = DB::table('shops')->max('id') + 1;
        $response = $this->delete('api/shops/'.$id);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }


    //TODO phase2, 3


    public function ifTitleIsNullOnApiProductsProduct_idThenReturn422ByPUT()
    {
        $id = DB::table('products')->max('id');
        $params = [
            'title' => '',
            'description' => 'description',
            'price' => 100,
        ];
        $response = $this->putJson('api/products/'.$id, $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }


    public function ifDescriptionIsNullOnApiProductsProduct_idThenReturn422ByPUT()
    {
        $id = DB::table('products')->max('id');
        $params = [
            'title' => 'title',
            'description' => '',
            'price' => 100,
        ];
        $response = $this->putJson('api/products/'.$id, $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }


    public function ifPriceIsNullOnApiProductsProduct_idThenReturn422ByPUT()
    {
        $id = DB::table('products')->max('id');
        $params = [
            'title' => 'title',
            'description' => 'description',
            'price' => '',
        ];
        $response = $this->putJson('api/products/'.$id, $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }


    /**
    * @test
    */
    public function ifNameIsNullOnApiShopsShop_idThenReturn422ByPUT()
    {
        $id = DB::table('shops')->max('id');
        $params = [
            'name' => ''
        ];
        $response = $this->putJson('api/shops/'.$id, $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }


    /**
    * @test
    */
    public function ifTitleIsOver100OnApiProductsProduct_idThenReturn422ByPUT()
    {
        $id = DB::table('products')->max('id');
        $params = [
            'title' => str_repeat('title', 50), //250 characters
            'description' => 'description',
            'price' => 100,
        ];
        $response = $this->putJson('api/products/'.$id, $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
    * @test
    */
    public function ifDescriptionIsOver500OnApiProductsProduct_idThenReturn422ByPUT()
    {
        $id = DB::table('products')->max('id');
        $params = [
            'title' => 'title',
            'description' => str_repeat('description', 100), //1100 characters
            'price' => 100,
        ];
        $response = $this->putJson('api/products/'.$id, $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
    * @test
    */
    public function ifPriceOfNegativeIntegerOnApiProductsProduct_idThenReturn422ByPUT()
    {
        $id = DB::table('products')->max('id');
        $params = [
            'title' => 'title',
            'description' => 'description',
            'price' => -1,
        ];
        $response = $this->putJson('api/products/'.$id, $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
    * @test
    */
    public function ifPriceOfFloatOnApiProductsProduct_idThenReturn422ByPUT()
    {
        $id = DB::table('products')->max('id');
        $params = [
            'title' => 'title',
            'description' => 'description',
            'price' => 0.1,
        ];
        $response = $this->putJson('api/products/'.$id, $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }


    /**
    * @test
    */
    public function ifPriceOfNotNumberOnApiProductsProduct_idThenReturn422ByPUT()
    {
        $id = DB::table('products')->max('id');
        $params = [
            'title' => 'title',
            'description' => 'description',
            'price' => 'price!',
        ];
        $response = $this->putJson('api/products/'.$id, $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
    * @test
    */
    public function ifNameIsOver100OnApiShopsShop_idThenReturn422ByPUT()
    {
        $id = DB::table('shops')->max('id');
        $params = [
            'name' => str_repeat('name', 50), //200 characters
        ];
        $response = $this->putJson('api/shops/'.$id, $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
    * @test
    */
    public function canUpdateOnlyTitleByPUT()
    {
        $id = DB::table('products')->max('id');
        $product = \App\Product::find($id);
        $params = [
            'title' => 'test_title',
        ];
        $response = $this->putJson('api/products/'.$id, $params);
        $this->assertFalse($product->title==='test_title');
    }
}
