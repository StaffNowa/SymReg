<?php

namespace IA\RegisterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IA\RegisterBundle\Entity\ContactInfo;
use IA\RegisterBundle\Form\ContactInfoType;

/**
 * ContactInfo controller.
 *
 * @Route("/contact_info")
 */
class ContactInfoController extends Controller
{

    /**
     * Lists all ContactInfo entities.
     *
     * @Route("/", name="contact_info")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IARegisterBundle:ContactInfo')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ContactInfo entity.
     *
     * @Route("/", name="contact_info_create")
     * @Method("POST")
     * @Template("IARegisterBundle:ContactInfo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new ContactInfo();
        $form = $this->createForm(new ContactInfoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contact_info'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new ContactInfo entity.
     *
     * @Route("/new", name="contact_info_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ContactInfo();
        $form   = $this->createForm(new ContactInfoType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ContactInfo entity.
     *
     * @Route("/{id}", name="contact_info_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:ContactInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactInfo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ContactInfo entity.
     *
     * @Route("/{id}/edit", name="contact_info_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:ContactInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactInfo entity.');
        }

        $editForm = $this->createForm(new ContactInfoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing ContactInfo entity.
     *
     * @Route("/{id}", name="contact_info_update")
     * @Method("PUT")
     * @Template("IARegisterBundle:ContactInfo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:ContactInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactInfo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContactInfoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contact_info_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ContactInfo entity.
     *
     * @Route("/{id}", name="contact_info_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IARegisterBundle:ContactInfo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ContactInfo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contact_info'));
    }

    /**
     * Creates a form to delete a ContactInfo entity by id.
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
