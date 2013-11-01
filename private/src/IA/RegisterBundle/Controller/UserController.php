<?php

namespace IA\RegisterBundle\Controller;

use Doctrine\Common\Util\Debug;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Query;
use IA\RegisterBundle\Entity\ContactInfo;
use IA\RegisterBundle\Entity\UserRole;
use IA\RegisterBundle\Form\UserRoleType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IA\RegisterBundle\Entity\User;
use IA\RegisterBundle\Entity\Role;
use IA\RegisterBundle\Form\UserType;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * User controller.
 *
 * @Route("/user")
 */
class UserController extends Controller
{
    /*
     * @Route("/", name="user")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return $this->forward('IARegisterBundle:User:list');
    }

    /**
     * Lists all User entities.
     *
     * @Route("/list", name="user")
     * @Method("GET")
     * @Template()
     */
    public function listAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_ADMIN'))
        {
            throw new AccessDeniedException();
        }
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('IARegisterBundle:User');

        /* @var $quary QueryBuilder */
        $query = $repository->createQueryBuilder('u')
            ->orderBy('u.created_at', 'ASC')
            ->getQuery();

        $users = $query->getResult();

        return array(
            'entities' => $users,
        );
    }
    /**
     * Creates a new User entity.
     *
     * @Route("/", name="user_create")
     * @Method("POST")
     * @Template("IARegisterBundle:User:new.html.twig")
     */
    public function createAction(Request $request)
    {
        /* TODO: @staff - add exists user validation */
        /* TODO @staff - add password compare */

        $cInfo = new ContactInfo();
        $cInfo->setAddress("");
        $cInfo->setFirstName("");
        $cInfo->setLastName("");
        $cInfo->setPersonalCode("");

        $entity  = new User();
        $form = $this->createForm(new UserType(), $entity);
        $form->bind($request);
        if ($form->get('email')->getData() != '')
        {
            $cInfo->setEmail($form->get('email')->getData());
        }

        $entity->setUserContact($cInfo);

        //encode password
        $userType = $request->request->get('ia_registerbundle_usertype');
        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($entity);
        $password = $encoder->encodePassword($userType['password']['confirm'], $entity->getSalt());
        $entity->setPassword($password);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cInfo);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new User entity.
     *
     * @Route("/new", name="user_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new User();
        $form   = $this->createForm(new UserType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/id/{id}", name="user_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('IARegisterBundle:User')->getUserById($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/id/{id}/edit", name="user_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createForm(new UserType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing User entity.
     *
     * @Route("/id/{id}", name="user_update")
     * @Method("PUT")
     * @Template("IARegisterBundle:User:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARegisterBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $entity->setUpdatedAt(new \DateTime());
        $editForm = $this->createForm(new UserType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a User entity.
     *
     * @Route("/id/{id}", name="user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IARegisterBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user'));
    }

    /**
     * Creates a form to delete a User entity by id.
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

    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
            'IARegisterBundle:User:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );
    }

//    /**
//     * Displays a form to edit an existing User entity.
//     *
//     * @Route("/id/{id}/edit", name="user_edit")
//     * @Method("GET")
//     * @Template()
//     */

    /**
     * Change User Role by userId
     *
     * @Route("/id/{id}/role", requirements={"id" = "\d+"}, name="user_role")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function roleAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('IARegisterBundle:User')->getUserRoleById($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $form = $this->createForm(new UserRoleType(), $entity);
        $roles = $em->getRepository('IARegisterBundle:Role')->getRoleList();

        if ($request->getMethod() == "POST")
        {
            //TODO: @staff fix problem with $form->get('role')->getData();
//            $data = $request->request->all();
//            $userRoles = $data['ia_registerbundle_user_role_type'];

            // get roles from $_POST
            $rolesData = $request->request->get('role');
            if ($rolesData)
            {
                $role = $em->getRepository('IARegisterBundle:Role')->findById($rolesData);
                $entity->setRoles($role);
            }
            $em->flush();
        }

        return array(
            'entity'        => $entity
            , 'user_id'     => $id
            , 'roles'       => $roles
            , 'role_form'   => $form->createView()
        );
    }
}
