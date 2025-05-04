<?php

namespace App\Tests;

use App\Product;
use App\ProductCollection;
use App\ManufacturerFilter;
use App\MaxPriceFilter;
use PHPUnit\Framework\TestCase;

class ProductFilterTest extends TestCase
{
    private $p1;
    private $p2;
    private $collection;

    protected function setUp(): void
    {
        $this->p1 = new Product();
        $this->p1->name = 'Шоколад';
        $this->p1->listPrice = 100;
        $this->p1->sellingPrice = 50;
        $this->p1->manufacturer = 'Красный Октябрь';

        $this->p2 = new Product();
        $this->p2->name = 'Мармелад';
        $this->p2->listPrice = 100;
        $this->p2->manufacturer = 'Ламзурь';

        $this->collection = new ProductCollection([$this->p1, $this->p2]);
    }

    public function testManufacturerFilter()
    {
        $filter = new ManufacturerFilter('Ламзурь');
        $result = $this->collection->filter($filter);
        
        $this->assertCount(1, $result->getProductsArray());
        $this->assertEquals($this->p2, $result->getProductsArray()[0]);
    }

    public function testMaxPriceFilter()
    {
        $filter = new MaxPriceFilter(50);
        $result = $this->collection->filter($filter);
        
        $this->assertCount(1, $result->getProductsArray());
        $this->assertEquals($this->p1, $result->getProductsArray()[0]);
    }

    public function testMaxPriceFilterWithDiscount()
    {
        $p3 = new Product();
        $p3->name = 'Зефир';
        $p3->listPrice = 200;
        $p3->sellingPrice = 60;
        $p3->manufacturer = 'Ударница';

        $collection = new ProductCollection([$this->p1, $this->p2, $p3]);
        $filter = new MaxPriceFilter(60);
        $result = $collection->filter($filter);
        
        $this->assertCount(2, $result->getProductsArray());
        $this->assertEquals($this->p1, $result->getProductsArray()[0]);
        $this->assertEquals($p3, $result->getProductsArray()[1]);
    }

    public function testEmptyResult()
    {
        $filter = new ManufacturerFilter('Несуществующий производитель');
        $result = $this->collection->filter($filter);
        
        $this->assertCount(0, $result->getProductsArray());
    }
}