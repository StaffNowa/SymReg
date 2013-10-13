<?php

namespace IA\RegisterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IA\RegisterBundle\Entity\WorkTime;
use IA\RegisterBundle\Form\WorkTimeType;

/**
 * WorkTime controller.
 *
 * @Route("/work_time")
 */
class WorkTimeController extends Controller
{

    /**
     * Lists all WorkTime entities.
     *
     * @Route("/", name="work_time")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IARegisterBundle:WorkTime')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new WorkTime entity.
     *
     * @Route("/", name="work_time_create")
     * @Method("POST")
     * @Template("IARegisterBundle:WorkTime:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new WorkTime();
        $form = $this->createForm(new WorkTimeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('work_time_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new WorkTime entity.
     *
     * @Route("/new", name="work_time_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new WorkTime();
        $form   = $this->createForm(new WorkTimeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a WorkTime entity.
     *
     * @Route("/{id}", name="work_time_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:WorkTime')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WorkTime entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing WorkTime entity.
     *
     * @Route("/{id}/edit", name="work_time_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:WorkTime')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WorkTime entity.');
        }

        $editForm = $this->createForm(new WorkTimeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing WorkTime entity.
     *
     * @Route("/{id}", name="work_time_update")
     * @Method("PUT")
     * @Template("IARegisterBundle:WorkTime:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:WorkTime')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WorkTime entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new WorkTimeType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('work_time_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a WorkTime entity.
     *
     * @Route("/{id}", name="work_time_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IARegisterBundle:WorkTime')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find WorkTime entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('work_time'));
    }

    /**
     * Creates a form to delete a WorkTime entity by id.
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
