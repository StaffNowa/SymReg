<?php

namespace IA\RegisterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IA\RegisterBundle\Entity\Pos;
use IA\RegisterBundle\Form\PosType;

/**
 * Pos controller.
 *
 * @Route("/pos")
 */
class PosController extends Controller
{

    /**
     * Lists all Pos entities.
     *
     * @Route("/", name="pos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IARegisterBundle:Pos')->findAll();

        return array(
            'entities' => $entities
        );
    }
    /**
     * Creates a new Pos entity.
     *
     * @Route("/", name="pos_create")
     * @Method("POST")
     * @Template("IARegisterBundle:Pos:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Pos();
        $form = $this->createForm(new PosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pos'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Pos entity.
     *
     * @Route("/new", name="pos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Pos();
        $form   = $this->createForm(new PosType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Pos entity.
     *
     * @Route("/{id}", name="pos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:Pos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Pos entity.
     *
     * @Route("/{id}/edit", name="pos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:Pos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pos entity.');
        }

        $editForm = $this->createForm(new PosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Pos entity.
     *
     * @Route("/{id}", name="pos_update")
     * @Method("PUT")
     * @Template("IARegisterBundle:Pos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:Pos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pos_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Pos entity.
     *
     * @Route("/{id}", name="pos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IARegisterBundle:Pos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pos'));
    }

    /**
     * Creates a form to delete a Pos entity by id.
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
