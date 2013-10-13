<?php

namespace IA\RegisterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosUser
 */
class PosUser
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $pos_id;

    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var \IA\RegisterBundle\Entity\Pos
     */
    private $puser_pos;

    /**
     * @var \IA\RegisterBundle\Entity\User
     */
    private $puser_user;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pos_id
     *
     * @param integer $posId
     * @return PosUser
     */
    public function setPosId($posId)
    {
        $this->pos_id = $posId;
    
        return $this;
    }

    /**
     * Get pos_id
     *
     * @return integer 
     */
    public function getPosId()
    {
        return $this->pos_id;
    }

    /**
     * Set user_id
     *
     * @param integer $userId
     * @return PosUser
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
    
        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set puser_pos
     *
     * @param \IA\RegisterBundle\Entity\Pos $puserPos
     * @return PosUser
     */
    public function setPuserPos(\IA\RegisterBundle\Entity\Pos $puserPos = null)
    {
        $this->puser_pos = $puserPos;
    
        return $this;
    }

    /**
     * Get puser_pos
     *
     * @return \IA\RegisterBundle\Entity\Pos 
     */
    public function getPuserPos()
    {
        return $this->puser_pos;
    }

    /**
     * Set puser_user
     *
     * @param \IA\RegisterBundle\Entity\User $puserUser
     * @return PosUser
     */
    public function setPuserUser(\IA\RegisterBundle\Entity\User $puserUser = null)
    {
        $this->puser_user = $puserUser;
    
        return $this;
    }

    /**
     * Get puser_user
     *
     * @return \IA\RegisterBundle\Entity\User 
     */
    public function getPuserUser()
    {
        return $this->puser_user;
    }

    public function __toString()
    {
        return (string)$this->getId();
    }
}
