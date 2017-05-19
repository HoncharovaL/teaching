<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SubjectType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Subjecttype controller.
 *
 * @Route("subjecttype")
 */
class SubjectTypeController extends Controller
{
    /**
     * Lists all subjectType entities.
     *
     * @Route("/", name="subjecttype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subjectTypes = $em->getRepository('AppBundle:SubjectType')->findAll();

        return $this->render('subjecttype/index.html.twig', array(
            'subjectTypes' => $subjectTypes,
        ));
    }

    /**
     * Creates a new subjectType entity.
     *
     * @Route("/new", name="subjecttype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subjectType = new Subjecttype();
        $form = $this->createForm('AppBundle\Form\SubjectTypeType', $subjectType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subjectType);
            $em->flush();

            return $this->redirectToRoute('subjecttype_show', array('idStype' => $subjectType->getIdstype()));
        }

        return $this->render('subjecttype/new.html.twig', array(
            'subjectType' => $subjectType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subjectType entity.
     *
     * @Route("/{idStype}", name="subjecttype_show")
     * @Method("GET")
     */
    public function showAction(SubjectType $subjectType)
    {
        $deleteForm = $this->createDeleteForm($subjectType);

        return $this->render('subjecttype/show.html.twig', array(
            'subjectType' => $subjectType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subjectType entity.
     *
     * @Route("/{idStype}/edit", name="subjecttype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SubjectType $subjectType)
    {
        $deleteForm = $this->createDeleteForm($subjectType);
        $editForm = $this->createForm('AppBundle\Form\SubjectTypeType', $subjectType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subjecttype_edit', array('idStype' => $subjectType->getIdstype()));
        }

        return $this->render('subjecttype/edit.html.twig', array(
            'subjectType' => $subjectType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subjectType entity.
     *
     * @Route("/{idStype}", name="subjecttype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SubjectType $subjectType)
    {
        $form = $this->createDeleteForm($subjectType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subjectType);
            $em->flush();
        }

        return $this->redirectToRoute('subjecttype_index');
    }

    /**
     * Creates a form to delete a subjectType entity.
     *
     * @param SubjectType $subjectType The subjectType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SubjectType $subjectType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subjecttype_delete', array('idStype' => $subjectType->getIdstype())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
