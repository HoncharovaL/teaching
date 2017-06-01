<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Messages;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use DateTime;

/**
 * Message controller.
 *
 * @Route("messages")
 */
class MessagesController extends Controller
{
    /**
     * Lists all message entities.
     *
     * @Route("/", name="messages_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $qb = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:Messages')->createQueryBuilder('n');
        $qb->select('distinct c.id, c.name, c.surname')->innerJoin('n.sender', 'c')->innerJoin('n.recipient', 'r');
        $qb->Where('c.id!='. $this->getUser()->getId());
        $qb->AndWhere('r.id='. $this->getUser()->getId());
        $messages= $qb->getQuery()->getResult();

        return $this->render('messages/index.html.twig', array(
            'messages' => $messages,
        ));
    }

    /**
     * Creates a new message entity.
     *
     * @Route("/new", name="messages_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $message = new Message();
        $form = $this->createForm('AppBundle\Form\MessagesType', $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();

            return $this->redirectToRoute('messages_show', array('idMes' => $message->getIdmes()));
        }

        return $this->render('messages/new.html.twig', array(
            'message' => $message,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a message entity.
     *
     * @Route("/{idMes}", name="messages_show")
     * @Method({"GET", "POST"})
     */
    public function showAction(String $idMes,Request $request)
    {    $em = $this->getDoctrine()->getManager();
         $query1 = $em->createQuery('SELECT p FROM AppBundle:Messages p WHERE (p.sender=?1 and p.recipient=?2) or (p.sender=?2 and p.recipient=?1)');
         $query1->setParameter(1,$idMes);
         $query1->setParameter(2,$this->getUser()->getId());
         $messages = $query1->getResult();      
        $message = new Messages();
        $form = $this->createForm('AppBundle\Form\MessagesType', $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $dt = new DateTime();
            $message->setDateMes($dt);
            $recipient = $em->getRepository('AppBundle:User')->findOneBy(['id' =>$idMes]);
            $message->setRecipient($recipient);
            $message->setSender($this->getUser());
            $em->persist($message);
            $em->flush();
            return $this->redirectToRoute('messages_show', array('idMes' =>$idMes));
        }
        return $this->render('messages/show.html.twig', array(
            'messages' => $messages,
            'message' => $message,
            'edit_form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing message entity.
     *
     * @Route("/{idMes}/edit", name="messages_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Messages $message)
    {
        $deleteForm = $this->createDeleteForm($message);
        $editForm = $this->createForm('AppBundle\Form\MessagesType', $message);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('messages_edit', array('idMes' => $message->getIdmes()));
        }

        return $this->render('messages/edit.html.twig', array(
            'message' => $message,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a message entity.
     *
     * @Route("/{idMes}", name="messages_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Messages $message)
    {
        $form = $this->createDeleteForm($message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($message);
            $em->flush();
        }

        return $this->redirectToRoute('messages_index');
    }

    /**
     * Creates a form to delete a message entity.
     *
     * @param Messages $message The message entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Messages $message)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('messages_delete', array('idMes' => $message->getIdmes())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
