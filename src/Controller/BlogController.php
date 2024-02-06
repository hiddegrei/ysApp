<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\BlogRepository;
use App\Repository\LikesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//opdracht 2
class BlogController extends AbstractController
{
    public function __construct(
        private UserRepository $userRepository,
        private BlogRepository $blogRepository,
        private LikesRepository $likesRepository
    ) {
        $this->blogRepository = $blogRepository;
        $this->userRepository = $userRepository;
        $this->likesRepository = $likesRepository;
    }
    #[Route('/blogs', name: 'app_blog')]
    public function index(): Response
    {
        $blogs = $this->blogRepository->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'posts' => $blogs,
            //'blogs'=>$blogs

        ]);
    }

    #[Route('/blogs/{user}', name: 'blog_find')]
    public function find($user): Response
    {
        $likedBlogs = $this->likesRepository
            ->createQueryBuilder('a')
            ->setParameter('userId', $user)
            ->setParameter('like', 1)
            ->where('a.user = :userId')
            ->andWhere('a.likeValue = :like')
            ->getQuery()
            ->getResult();


        $blogs = [];
        foreach ($likedBlogs as $row) {
            //dd($row->getBlog());
            $query = $this->blogRepository->find($row->getBlog());
            if ($query != null) {
                $blogs[] = $query;
            }
        }


        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'posts' => $blogs,

        ]);
    }
}
