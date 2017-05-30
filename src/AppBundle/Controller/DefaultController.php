<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Search;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $search = new Search();
        $form = $this->createForm('AppBundle\Form\SearchType', $search);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $ads = $em->getRepository('AppBundle:Ad')->findBy([], ['top' => 'DESC']);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            return $this->render('default/index.html.twig', array(
            'ads' => $ads,
            'form' => $form->createView(),
        ));
        }


        return $this->render('default/index.html.twig', array(
            'ads' => $ads,
            'form' => $form->createView(),
            'search'=>$search,
        ));
        // replace this example code with whatever you need
        //return $this->render('default/index.html.twig', ['base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
       // ]);
    }
}
