<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY_DATA = 'CATEGORY_DATA';
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $category = new Category(); 
        $category->setName("Actualités");
        $this->setReference(self::CATEGORY_DATA, $category);

        $manager->persist($category);

        $manager->flush();
    }
}
