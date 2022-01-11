<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category')]
        public function index(
        CategoryRepository $categoryRepository,
        PaginatorInterface $paginator,
        Request $request,
    ): Response {
    $categories = $categoryRepository->findAll();
   
    $category = $paginator->paginate(
        $categories, /* query NOT result */
        $request->query->getInt('page', 1), /*page number*/
    6 /*limit per page*/
    );

    return $this->render('category/index.html.twig', [
        'category' => $categories,
    ]);
}
}
