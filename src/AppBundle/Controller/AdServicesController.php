<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AdServices;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Adservice controller.
 *
 * @Route("adservices")
 */
class AdServicesController extends Controller
{
    /**
     * Lists all adService entities.
     *
     * @Route("/", name="adservices_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $adServices = $em->getRepository('AppBundle:AdServices')->findAll();

        return $this->render('adservices/index.html.twig', array(
            'adServices' => $adServices,
        ));
    }

    /**
     * Creates a new adService entity.
     *
     * @Route("/new", name="adservices_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $adService = new Adservices();
        $form = $this->createForm('AppBundle\Form\AdServicesType', $adService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($adService);
            $em->flush();

            return $this->redirectToRoute('adservices_show', array('idServices' => $adService->getIdservices()));
        }

        return $this->render('adservices/new.html.twig', array(
            'adService' => $adService,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a adService entity.
     *
     * @Route("/{idServices}", name="adservices_show")
     * @Method("GET")
     */
    public function showAction(AdServices $adService)
    {
        $deleteForm = $this->createDeleteForm($adService);

        return $this->render('adservices/show.html.twig', array(
            'adService' => $adService,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing adService entity.
     *
     * @Route("/{idServices}/edit", name="adservices_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AdServices $adService)
    {
        $deleteForm = $this->createDeleteForm($adService);
        $editForm = $this->createForm('AppBundle\Form\AdServicesType', $adService);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adservices_edit', array('idServices' => $adService->getIdservices()));
        }

        return $this->render('adservices/edit.html.twig', array(
            'adService' => $adService,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a adService entity.
     *
     * @Route("/{idServices}", name="adservices_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AdServices $adService)
    {
        $form = $this->createDeleteForm($adService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($adService);
            $em->flush();
        }

        return $this->redirectToRoute('adservices_index');
    }

    /**
     * Creates a form to delete a adService entity.
     *
     * @param AdServices $adService The adService entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AdServices $adService)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adservices_delete', array('idServices' => $adService->getIdservices())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
