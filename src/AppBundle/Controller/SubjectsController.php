<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Subjects;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Subject controller.
 *
 * @Route("subjects")
 */
class SubjectsController extends Controller
{
    /**
     * Lists all subject entities.
     *
     * @Route("/", name="subjects_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subjects = $em->getRepository('AppBundle:Subjects')->findAll();

        return $this->render('subjects/index.html.twig', array(
            'subjects' => $subjects,
        ));
    }

    /**
     * Creates a new subject entity.
     *
     * @Route("/new", name="subjects_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subject = new Subjects();
        $form = $this->createForm('AppBundle\Form\SubjectsType', $subject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subject);
            $em->flush();

            return $this->redirectToRoute('subjects_show', array('idSubject' => $subject->getIdsubject()));
        }

        return $this->render('subjects/new.html.twig', array(
            'subject' => $subject,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subject entity.
     *
     * @Route("/{idSubject}", name="subjects_show")
     * @Method("GET")
     */
    public function showAction(Subjects $subject)
    {
        $deleteForm = $this->createDeleteForm($subject);

        return $this->render('subjects/show.html.twig', array(
            'subject' => $subject,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subject entity.
     *
     * @Route("/{idSubject}/edit", name="subjects_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Subjects $subject)
    {
        $deleteForm = $this->createDeleteForm($subject);
        $editForm = $this->createForm('AppBundle\Form\SubjectsType', $subject);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subjecttype_index', array('idSubject' => $subject->getIdsubject()));
        }

        return $this->render('subjects/edit.html.twig', array(
            'subject' => $subject,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subject entity.
     *
     * @Route("/{idSubject}", name="subjects_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Subjects $subject)
    {
        $form = $this->createDeleteForm($subject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subject);
            $em->flush();
        }

        return $this->redirectToRoute('subjecttype_index');
    }

    /**
     * Creates a form to delete a subject entity.
     *
     * @param Subjects $subject The subject entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Subjects $subject)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subjects_delete', array('idSubject' => $subject->getIdsubject())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
