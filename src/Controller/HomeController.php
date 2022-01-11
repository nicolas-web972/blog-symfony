<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(
        PostRepository $postRepository,
        PaginatorInterFace $paginator,
        HttpFoundationRequest $request
        ): Response{ 
        $posts = $postRepository->findAll();
       
        $posts = $paginator->paginate(
            $posts, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
        6 /*limit per page*/);

        return $this->render('home/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
