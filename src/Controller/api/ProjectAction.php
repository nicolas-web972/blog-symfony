<?php
// api/src/Controller/ProjectAction.php

namespace App\Controller\Api;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

#[AsController]
final class ProjectAction extends AbstractController
{
    public function __invoke(Request $request): Post
    {
        $uploadedFile = $request->files->get('file');
        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }

        $post = new Post();
        $post->file = $uploadedFile;

        return $post;
    }
}