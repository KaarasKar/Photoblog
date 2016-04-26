<?php

namespace PhotoBlogger\PhotoBundle\Controller;

use PhotoBlogger\PhotoBundle\Entity\Article;
use PhotoBlogger\PhotoBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ArticleController extends Controller
{
    public function newAction()
    {
        $article = new Article();
        $form = $this->createForm(new ArticleType(), $article);

        return $this->render('PhotoBloggerPhotoBundle:Default:index.html.twig', array(
            'article' => $article,
            'form'   => $form->createView()
        ));
    }
}
