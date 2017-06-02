<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\Search;
use AppBundle\Entity\Messages;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use DateTime;

/**
 * User controller.
 *
 * @Route("user")
 */
class UserController extends Controller
{
    /**
     * Lists all user entities.
     *
     * @Route("/", name="user_index")
         * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {         
        $search = new Search();
        $form = $this->createForm('AppBundle\Form\SearchUserType', $search);
        $form->handleRequest($request);
        $qb = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:User')->createQueryBuilder('n');
        $qb->select('n')->orderBy('n.surname','DESC');
         if ($search->search) {
               $qb->Where($qb->expr()->like('n.name', $qb->expr()->literal('%' . $search->search . '%')));
               $qb->orWhere($qb->expr()->like('n.surname', $qb->expr()->literal('%' . $search->search . '%')));
        } ;
           
        $users = $qb->getQuery()->getResult();
 
        return $this->render('user/index.html.twig', array(
            'users' => $users,
            'form' => $form->createView(),
            'search'=>$search,
        ));

    }

    /**
     * Creates a new user entity.
     *
     * @Route("/new", name="user_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('AppBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     * @Route("/{id}", name="user_show")
    * @Method({"GET", "POST"})
     */
    public function showAction(User $user,Request $request)
    {    $em = $this->getDoctrine()->getManager();
        
        $message = new Messages();
        $form = $this->createForm('AppBundle\Form\MessagesType', $message);
        $form->handleRequest($request);
         $deleteForm = $this->createDeleteForm($user);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $dt = new DateTime();
            $message->setDateMes($dt);
            //$recipient = $em->getRepository('AppBundle:User')->findOneBy(['id' =>$user->getId()]);
            $message->setRecipient($user);
            $message->setSender($this->getUser());
            $em->persist($message);
            $em->flush();
            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }
        return $this->render('user/show.html.twig', array(
            'message' => $message,
            'edit_form' => $form->createView(),
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
            
        ));

    }

    /**
     * Displays a form to edit an existing user entity.
     *
     * @Route("/{id}/edit", name="user_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('AppBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit', array('id' => $user->getId()));
        }

        return $this->render('user/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user entity.
     *
     * @Route("/{id}", name="user_delete")
     */
    public function deleteAction(Request $request, User $user)
    {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
