<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $ads = $em->getRepository('AppBundle:Ad')->findBy([], ['id_services' => 'DESC']);

        return $this->render('default/index.html.twig', array(
            'ads' => $ads,
        ));
        // replace this example code with whatever you need
        //return $this->render('default/index.html.twig', ['base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
       // ]);
    }
}
