<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Requests;

//opdracht 1
class PostController extends AbstractController
{

    public function __construct(private Requests $getPosts){
        $this->getPosts = $getPosts;

    }

    #[Route('/posts', methods: ['GET'], name: 'posts_index')]
    public function index(): Response
    {
        $data = $this->getPosts->getPosts();
        //dd($data);
        return $this->render('post/index.html.twig', [
            'posts' => $data,
        ]);
    }

    #[Route('/posts/{postId}', methods: ['GET'], name: 'posts_show')]
    public function show($postId): Response
    {
        $data = $this->getPosts->getPosts();

        $results = array_filter($data, function ($item) use ($postId) {
            return $item['userId'] == $postId;
        });

        return $this->render('post/show.html.twig', [
            'posts' => $results,
        ]);
    }
}
