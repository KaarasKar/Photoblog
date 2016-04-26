<?php

namespace PhotoBlogger\PhotoBundle\Controller;

use PhotoBlogger\PhotoBundle\Entity\Enquiry;
use PhotoBlogger\PhotoBundle\Form\EnquiryType;
use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PhotoBloggerPhotoBundle:Default:index.html.twig');
    }

    public function contactAction()
    {
        return $this->render('PhotoBloggerPhotoBundle:Default:index.html.twig');
    }
    public function emailSendAction(Request $request)
    {
        $em=$request->getContent();
        $json=json_decode($em);
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);
        $result = new stdClass();
        $result->result=false;
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $message = \Swift_Message::newInstance()
                ->setSubject($request->request->get('content'))
                ->setFrom($request->request->get('senderEmail'))
                ->setTo($this->container->getParameter('photoblogger_photoblog.emails.contact_email'))
                ->setBody($this->renderView('PhotoBloggerPhotoBundle:Default:contactEmail.txt.twig', array('enquiry' => $enquiry)));
            $result->result=true;
        }
        //     $result->requestData=$json;
        $form->requestData=$json;
        $json->content;
        return new JsonResponse($form);
    }
}
