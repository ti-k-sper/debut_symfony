<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $articleRepo)
    {
        //si pas dans index ArticleRepository $articleRepo
        //$articleRepo = $this->getDoctrine()->getRepository(Article::class);

        $articles = $articleRepo->findAll();
        //dd($articles);
        
        return $this->render('blog/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/blog/show/{id}", name="blog_show")
     */
                        //Request $request
    public function show(Article $article)
    {
        return $this->render('blog/show.html.twig', [
            'article' => $article,
        ]);
    }
}
