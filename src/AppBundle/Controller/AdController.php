<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ad;
use AppBundle\Entity\AdQuery;
use AppBundle\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use DateTime;
use Symfony\Component\Form\Extension\Core\Type\FormType;
/**
 * Ad controller.
 *
 * @Route("ad")
 */
class AdController extends Controller
{
    /**
     * Lists all ad entities.
     *
     * @Route("/", name="ad_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ads = $em->getRepository('AppBundle:Ad')->findBy(['user' => $this->getUser()]);

        return $this->render('ad/index.html.twig', array(
            'ads' => $ads,
        ));
    }

    /**
     * Creates a new ad entity.
     *
     * @Route("/new", name="ad_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ad = new Ad();
        $form = $this->createForm('AppBundle\Form\AdType', $ad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $dt = new DateTime();
            $ad->setAdate($dt);
            $ad->setUser($this->getUser());
            $em->persist($ad);
            $em->flush();

            return $this->redirectToRoute('ad_show', array('idAd' => $ad->getIdad()));
        }

        return $this->render('ad/new.html.twig', array(
            'ad' => $ad,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ad entity.
     *
     * @Route("/{idAd}", name="ad_show")
     * @Method({"GET", "POST"})
     */
    public function showAction(Ad $ad,Request $request1)
    {   $em = $this->getDoctrine()->getManager();
        $comments =$em->getRepository('AppBundle:Review')->findBy(['idAd' => $ad->getIdAd()]);
        $adQuery=new AdQuery();
        $queryForm = $this->createForm('AppBundle\Form\AdQueryUserType', $adQuery);
        $queryForm->handleRequest($request1);
        $comment = new Review();
        $form = $this->createForm('AppBundle\Form\ReviewUserType', $comment);
        $form->handleRequest($request1);
        //0-запрос на подтверждение отправлен, ответ не получен,1-запрос подтвержден, но оценка не оставлена,2-запрос не отправлен,3-оценка оставлена
        $query1 = $em->createQuery('SELECT p.confirm FROM AppBundle:AdQuery p WHERE p.idAd=?1 and p.user=?2');
            $query1->setParameter(1,$ad->getIdAd());
            $query1->setParameter(2,$this->getUser());
            $confirm = $query1->getSingleScalarResult();
            if ($confirm==null) 
               {
                $confirm=2;
                }
            else 
            {
            if($confirm==1)
            {
            $query1 = $em->createQuery('SELECT count(p) FROM AppBundle:Review p WHERE p.idAd=?1 and p.user=?2');
            $query1->setParameter(1,$ad->getIdAd());
            $query1->setParameter(2,$this->getUser());
            $review = $query1->getSingleScalarResult();
            if ($review>0) {$confirm=3; } 
            }
            }
            $notuser=true;
            if($this->getUser()==$ad->getUser()) {$notuser=false;}
        if ($queryForm->isSubmitted() && $queryForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $adQuery->setUser($this->getUser());
            $adQuery->setTeacher($ad->getUser());
            $adQuery->setIdAd($ad->getIdAd());
            $adQuery->setConfirm(0);
            $em->persist($adQuery);
            $em->flush();
            return $this->redirectToRoute('ad_show', array('idAd' => $ad->getIdad()));
        }

       if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager(); 
            $dt = new DateTime();
            $comment->setrdate($dt);
            $comment->setUser($this->getUser());
            $comment->setIdAd($ad->getIdAd());
            $comment->setIdTeacher($ad->getUser()->getId());
            $em->persist($comment);
            $em->flush();
            $comments =$em->getRepository('AppBundle:Review')->findBy(['idAd' => $ad->getIdAd()]);
            $query = $em->createQuery('SELECT avg(p.rating) FROM AppBundle:Review p WHERE p.idTeacher=?1');
            $query->setParameter(1,$ad->getUser()->getId());
            $rating = $query->getSingleScalarResult();
            $teacher =$em->getRepository('AppBundle:User')->findOneBy(['id' => $ad->getUser()->getId()]);
            $teacher->setRating($rating);
            $em->persist($teacher);
            $em->flush();
            return $this->redirectToRoute('ad_show', array('idAd' => $ad->getIdad()));

        }


        return $this->render('ad/show.html.twig', array(
            'ad' => $ad,
            'query_form' => $queryForm->createView(),
            'comments'=>$comments,
            'form'=> $form->createView(),
            'confirm'=>$confirm,
            'notuser'=>$notuser,
        ));
        
        
    }

    /**
     * Displays a form to edit an existing ad entity.
     *
     * @Route("/{idAd}/edit", name="ad_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ad $ad)
    {
        $deleteForm = $this->createDeleteForm($ad);
        $editForm = $this->createForm('AppBundle\Form\AdType', $ad);
        $editForm->handleRequest($request);
        
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ad_edit', array('idAd' => $ad->getIdad()));
        }
        return $this->render('ad/edit.html.twig', array(
            'ad' => $ad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ad entity.
     *
     * @Route("/{idAd}", name="ad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ad $ad)
    {
        $form = $this->createDeleteForm($ad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ad);
            $em->flush();
        }

        return $this->redirectToRoute('ad_index');
    }

    /**
     * Creates a form to delete a ad entity.
     *
     * @param Ad $ad The ad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ad $ad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ad_delete', array('idAd' => $ad->getIdad())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
