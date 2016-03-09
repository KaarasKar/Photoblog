<?php

namespace PhotoBlogger\PhotoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PhotoBloggerPhotoBundle:Default:index.html.twig');
    }

//    public function getUsers(){
//        $em = $this->getDoctrine();
//        $usersFromDoctrine = $em->getRepository("FooBarBundle:user")->findAll();
//        $users = array();
//
//        foreach($usersFromDoctrine as $user){
//            $users[$user->getId()]=array("id"=>$user->getId());
//        }
//
//        return new JsonResponse($users);
//    }

    /**
     * @Route("/{username}/salt", requirements={"username" = "\w+"})
     */
    public function saltAction($username)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($username);
        if ( is_null($user) )
        {
            throw new HttpException(400, "Error User Not Found");
        }
        return new JsonResponse(array('salt' => $user->getSalt()));
    }

    /**
     * @Route("/{username}/info", requirements={"username" = "\w+"})
     */
    public function infoAction($username)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($username);
        if ( is_null($user) )
        {
            throw new HttpException(400, "Error User Not Found");
        }
        return new JsonResponse(array('username' => array('salt' => $user->getSalt())));
    }
}
