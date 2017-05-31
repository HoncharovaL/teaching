<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AdQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Adquery controller.
 *
 * @Route("adquery")
 */
class AdQueryController extends Controller
{
    /**
     * Lists all adQuery entities.
     *
     * @Route("/", name="adquery_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $adQueries = $em->getRepository('AppBundle:AdQuery')->findAll();

        return $this->render('adquery/index.html.twig', array(
            'adQueries' => $adQueries,
        ));
    }

    /**
     * Creates a new adQuery entity.
     *
     * @Route("/new", name="adquery_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $adQuery = new Adquery();
        $form = $this->createForm('AppBundle\Form\AdQueryType', $adQuery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($adQuery);
            $em->flush();

            return $this->redirectToRoute('adquery_show', array('idQuery' => $adQuery->getIdquery()));
        }

        return $this->render('adquery/new.html.twig', array(
            'adQuery' => $adQuery,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a adQuery entity.
     *
     * @Route("/{idQuery}", name="adquery_show")
     * @Method("GET")
     */
    public function showAction(AdQuery $adQuery)
    {
        $deleteForm = $this->createDeleteForm($adQuery);
        $confirmForm = $this->createDeleteForm($adQuery);

        return $this->render('adquery/show.html.twig', array(
            'adQuery' => $adQuery,
            'delete_form' => $deleteForm->createView(),
            'confirm_form' => $confirmForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing adQuery entity.
     *
     * @Route("/{idQuery}/edit", name="adquery_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AdQuery $adQuery)
    {
        $deleteForm = $this->createDeleteForm($adQuery);
        $editForm = $this->createForm('AppBundle\Form\AdQueryType', $adQuery);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adquery_edit', array('idQuery' => $adQuery->getIdquery()));
        }

        return $this->render('adquery/edit.html.twig', array(
            'adQuery' => $adQuery,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a adQuery entity.
     *
     * @Route("/{idQuery}", name="adquery_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AdQuery $adQuery)
    {
        $form = $this->createDeleteForm($adQuery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($adQuery);
            $em->flush();
        }

        return $this->redirectToRoute('adquery_index');
    }

    /**
     * Creates a form to delete a adQuery entity.
     *
     * @param AdQuery $adQuery The adQuery entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AdQuery $adQuery)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adquery_delete', array('idQuery' => $adQuery->getIdquery())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
        /**
     * Creates a form to confirm a adQuery entity.
     *
     * @param AdQuery $adQuery The adQuery entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createConfirmForm(AdQuery $adQuery)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adquery_confirm', array('idQuery' => $adQuery->getIdquery())))
            ->setMethod('POST')
            ->getForm()
        ;
    }
    
        /**
     * Confirms a adQuery entity.
     *
     * @Route("/{idQuery}", name="adquery_confirm")
     * @Method({"GET", "POST"})
     */
    public function confirmAction(Request $request, AdQuery $adQuery)
    {
        $form = $this->createConfirmForm($adQuery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $adQuery->setConfirm(1);
            $em->persist($adQuery);
            $em->flush();
        }

        return $this->redirectToRoute('adquery_index');
    }
}
