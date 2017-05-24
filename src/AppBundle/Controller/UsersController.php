<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 * @Route("users")
 */
class UsersController extends Controller
{
    /**
     * Lists all user entities.
     *
     * @Route("/", name="users_index")
     * @Method("GET")
     */
    public function indexAction()//(Request $idFosUser)
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:Users')->findAll();//->findBy(['idFosUser' => $idFosUser->get('idFosUser')]);

        return $this->render('users/index.html.twig', array(
            'users' => $users,
        ));
    }
/**
     *
     * @Route("/choise", name="users_choise")
     * @Method("GET")
     */
    public function choiseAction(Request $idFosUser,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:Users')->findBy(['idFosUser' => $idFosUser->get('idFosUser')]);
        $countr = count($user);
      if ($countr>0)
        {
          $us=new Users($user);
        $deleteForm = $this->createDeleteForm($us);
        return $this->render('users/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
             
        }
        else
        {
        $user = new Users();
        $form = $this->createForm('AppBundle\Form\UsersType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('users_show', array('idUser' => $user->getIduser()));
        }

        return $this->render('users/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
        }
        
        

    }
    /**
     * Creates a new user entity.
     *
     * @Route("/new", name="users_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $user = new Users();
        $form = $this->createForm('AppBundle\Form\UsersType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('users_show', array('idUser' => $user->getIduser()));
        }

        return $this->render('users/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     * @Route("/{idUser}", name="users_show")
     * @Method("GET")
     */
    public function showAction(Users $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('users/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing user entity.
     *
     * @Route("/{idUser}/edit", name="users_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Users $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('AppBundle\Form\UsersType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('users_edit', array('idUser' => $user->getIduser()));
        }

        return $this->render('users/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user entity.
     *
     * @Route("/{idUser}", name="users_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Users $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('users_index');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param Users $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Users $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('users_delete', array('idUser' => $user->getIduser())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    
}
