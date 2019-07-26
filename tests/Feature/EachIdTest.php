<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DB;

class EachIdTest extends TestCase
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

}
