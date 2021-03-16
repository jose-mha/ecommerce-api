<?php

namespace Tests\Feature;

use App\Category;
use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * ! Test para saber que un producto pertenece a una categoria
     *
     * @return void
     */
    public function test_a_product_belongs_to_category()
    {
        $category = factory(Category::class)->create();
        $product = factory(Product::class)->create(['category_id' => $category->id]);

        $this->assertInstanceOf(Category::class, $product->category);
    }
}
