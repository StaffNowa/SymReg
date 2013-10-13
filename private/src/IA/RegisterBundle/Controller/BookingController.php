<?php

namespace IA\RegisterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IA\RegisterBundle\Entity\Booking;
use IA\RegisterBundle\Form\BookingType;

/**
 * Booking controller.
 *
 * @Route("/booking")
 */
class BookingController extends Controller
{

    /**
     * Lists all Booking entities.
     *
     * @Route("/", name="booking")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IARegisterBundle:Booking')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Booking entity.
     *
     * @Route("/", name="booking_create")
     * @Method("POST")
     * @Template("IARegisterBundle:Booking:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Booking();
        $form = $this->createForm(new BookingType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('booking_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Booking entity.
     *
     * @Route("/new", name="booking_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Booking();
        $form   = $this->createForm(new BookingType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Booking entity.
     *
     * @Route("/{id}", name="booking_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:Booking')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Booking entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Booking entity.
     *
     * @Route("/{id}/edit", name="booking_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:Booking')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Booking entity.');
        }

        $editForm = $this->createForm(new BookingType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Booking entity.
     *
     * @Route("/{id}", name="booking_update")
     * @Method("PUT")
     * @Template("IARegisterBundle:Booking:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:Booking')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Booking entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BookingType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('booking_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Booking entity.
     *
     * @Route("/{id}", name="booking_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IARegisterBundle:Booking')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Booking entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('booking'));
    }

    /**
     * Creates a form to delete a Booking entity by id.
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
