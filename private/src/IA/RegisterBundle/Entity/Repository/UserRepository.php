<?php
/**
 * Created by JetBrains PhpStorm.
 * User: staff - info@prado.lt
 * Date: 2013-09-18
 * Time: 20:33
 */

namespace IA\RegisterBundle\Entity\Repository;

use Doctrine\DBAL\Query\QueryException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Query;

class UserRepository extends EntityRepository
{
    public function getUserById($userId)
    {
        $q = $this
            ->createQueryBuilder('u')
            ->select('u, c')
            ->leftJoin('u.user_contact', 'c')
            ->where('u.id =:user_id')
            ->setParameter('user_id', $userId)
            ->getQuery();

        try {
            // The Query::getSingleResult() method throws an exception
            // if there is no record matching the criteria.
            $user = $q->getSingleResult();
        } catch (NoResultException $e) {
            $message = sprintf(
                'Unable to find an active user IARegisterBundle:User object identified by "%s".',
                $userId
            );
            throw new QueryException($message, 0, $e);
        }

        return $user;
    }

    /**
     * Get User Role by User Id
     * @param $userId UserId
     * @return mixed
     * @throws \Doctrine\DBAL\Query\QueryException
     */
    public function getUserRoleById($userId)
    {
        $q = $this
            ->createQueryBuilder('u')
            ->select('u, r')
            ->leftJoin('u.roles', 'r')
            ->where('u.id =:user_id')
            ->setParameter('user_id', $userId)
            ->getQuery();

        try {
            // The Query::getSingleResult() method throws an exception
            // if there is no record matching the criteria.
            $user = $q->getSingleResult(Query::HYDRATE_ARRAY);
        } catch (NoResultException $e) {
            $message = sprintf(
                'Unable to find an active user IARegisterBundle:User object identified by "%s".',
                $userId
            );
            throw new QueryException($message, 0, $e);
        }

        return $user;
    }

    /**
     * Return User Roles from database
     * @return array
     * @throws \Doctrine\DBAL\Query\QueryException
     */
    public function getRolesList()
    {
        $q = $this->getEntityManager()
            ->createQuery('SELECT r FROM IARegisterBundle:Role r');

        try{
           $roles = $q->getResult(Query::HYDRATE_ARRAY);
        } catch(NoResultException $e)
        {
            $message = '';
            throw new QueryException($message, 0, $e);
        }

        return $roles;
    }
}