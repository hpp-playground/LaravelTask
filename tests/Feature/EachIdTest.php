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
        DB::statement('ALTER TABLE products AUTO_INCREMENT = 1;');
        DB::statement('ALTER TABLE shops AUTO_INCREMENT = 1;');
        $this->artisan('db:seed', ['--class' => 'TestDataSeeder']);
    }

    /**
    * @test
    */
    public function responseFromApiProductsProduct_idByGETIsJSON()
    {
        $id = DB::table('products')->max('id');
        $response = $this->get('api/products/' . $id);
        $this->assertThat($response->content(), $this->isJson());
    }

    /**
    * @test
    */
    public function JSONFromApiProductsProduct_idByGETSatisfyRequirements()
    {
        $id = DB::table('products')->max('id');
        $response = $this->get('api/products/' . $id);
        $product = $response->json();
        $this->assertSame(['title', 'description','price'], array_keys($product));
    }

}
