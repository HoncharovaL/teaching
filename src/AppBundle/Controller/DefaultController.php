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
        $qb->select('n,c')->leftJoin('n.subject', 'c')->orderBy('n.top','DESC');
        $i=0;
         if ($search->search) {
               $qb->Where($qb->expr()->like('c.subject', $qb->expr()->literal('%' . $search->search . '%')));
               $qb->orWhere($qb->expr()->like('n.adText', $qb->expr()->literal('%' . $search->search . '%')));
               $i++;
        } ;
        if ($search->town) {
            if($i==0) {
                $qb->Where($qb->expr()->like($field, $qb->expr()->literal('%' . $search->town . '%')));
                $i++;
            }
                else  $qb->andWhere($qb->expr()->like($field, $qb->expr()->literal('%' . $search->town . '%')));
        }
      
        if ($search->area) {
            if($i==0) {
                $qb->Where($qb->expr()->like($field, $qb->expr()->literal('%' . $search->area . '%')));
                $i++;
            }
                else 
                $qb->andWhere($qb->expr()->like($field, $qb->expr()->literal('%' . $search->area . '%')));
        }
          
        if ($search->place) 
        {   if($i==0) {
                $qb->Where('n.place='. $search->place);
                $i++;
            }
                else $qb->andWhere('n.place='. $search->place);
        }
        if ($search->pricemin) 
            {   if($i==0) {
                $qb->Where('n.price>='. $search->pricemin);
                $i++;
            }
                else   
            $qb->andWhere('n.price>='. $search->pricemin);
        }
        if ($search->pricemax)
           {   if($i==0) {
                  $qb->Where('n.price<='. $search->pricemax);  
                $i++;
            }
                else  
            $qb->andWhere('n.price<='. $search->pricemax);  
           }
        if ($search->currency) 
        {   if($i==0) {
                  $qb->andWhere('n.currency='. $search->currency); 
                $i++;
            }
                else  
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
