<?php

namespace IA\RegisterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IA\RegisterBundle\Entity\PosUser;
use IA\RegisterBundle\Form\PosUserType;

/**
 * PosUser controller.
 *
 * @Route("/pos_user")
 */
class PosUserController extends Controller
{

    /**
     * Lists all PosUser entities.
     *
     * @Route("/", name="pos_user")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IARegisterBundle:PosUser')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new PosUser entity.
     *
     * @Route("/", name="pos_user_create")
     * @Method("POST")
     * @Template("IARegisterBundle:PosUser:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new PosUser();
        $form = $this->createForm(new PosUserType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pos_user_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new PosUser entity.
     *
     * @Route("/new", name="pos_user_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PosUser();
        $form   = $this->createForm(new PosUserType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a PosUser entity.
     *
     * @Route("/{id}", name="pos_user_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:PosUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosUser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PosUser entity.
     *
     * @Route("/{id}/edit", name="pos_user_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:PosUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosUser entity.');
        }

        $editForm = $this->createForm(new PosUserType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing PosUser entity.
     *
     * @Route("/{id}", name="pos_user_update")
     * @Method("PUT")
     * @Template("IARegisterBundle:PosUser:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:PosUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosUser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PosUserType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pos_user_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a PosUser entity.
     *
     * @Route("/{id}", name="pos_user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IARegisterBundle:PosUser')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PosUser entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pos_user'));
    }

    /**
     * Creates a form to delete a PosUser entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
