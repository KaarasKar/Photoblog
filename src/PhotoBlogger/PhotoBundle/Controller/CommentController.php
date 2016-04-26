<?php


namespace PhotoBlogger\PhotoBundle\Controller;


use PhotoBlogger\PhotoBundle\Entity\Comment;
use PhotoBlogger\PhotoBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Comment controller.
 */
class CommentController extends Controller
{
    public function newAction($id_my_user)
    {
        $comment = new Comment();
        $form   = $this->createForm(new CommentType(), $comment);

        return $this->render('PhotoBloggerPhotoBundle:Default:form.html.twig', array(
            'comment' => $comment,
            'form'   => $form->createView()
        ));
    }

    public function createAction($id_my_user)
    {
        $user = $this->getUser($id_my_user);

        $comment  = new Comment();

        $request = $this->getRequest();
        $form    = $this->createForm(new CommentType(), $comment);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()
                ->getEntityManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirect($this->generateUrl('photo_blogger_photo_homepage', array(
                    'id' => $comment->getUser()->getId())) .
                '#comment-' . $comment->getId()
            );
        }

        return $this->render('PhotoBloggerPhotoBundle:Default:create.html.twig', array(
            'comment' => $comment,
            'form'    => $form->createView()
        ));
    }

    public function getUsers($id_my_user)
    {
        $em = $this->getDoctrine()
            ->getEntityManager();

        $user = $em->getRepository('PhotoBloggerPhotoBundle:User')->find($id_my_user);

        if (!$user) {
            throw $this->createNotFoundException('Unable to find user post.');
        }

        return $user;
    }
}