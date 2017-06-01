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
        $qb = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:Ad')->createQueryBuilder('n');
        $qb->select('n,c')->innerJoin('n.subject', 'c')->orderBy('n.top','DESC');
        $qb->Where('n.state=3');
         if ($search->search) {
               $qb->orWhere($qb->expr()->like('n.adText', $qb->expr()->literal('%' . $search->search . '%')));
        } ;
        if ($search->town) {
               $qb->andWhere($qb->expr()->like('n.town', $qb->expr()->literal('%' . $search->town . '%')));
        }
      
        if ($search->area) {
                $qb->andWhere($qb->expr()->like('n.area', $qb->expr()->literal('%' . $search->area . '%')));
        }
          
        if ($search->place) 
        {   $qb->andWhere('n.place='. $search->place);
        }
        if ($search->pricemin) 
            {     
            $qb->andWhere('n.price>='. $search->pricemin);
        }
        if ($search->pricemax)
           {
            $qb->andWhere('n.price<='. $search->pricemax);  
           }
        if ($search->currency) 
        {   
            $qb->andWhere('n.currency='. $search->currency);
        }
   
        $ads = $qb->getQuery()->getResult();
 
        return $this->render('default/index.html.twig', array(
            'ads' => $ads,
            'form' => $form->createView(),
            'search'=>$search,
        ));

    }
}
