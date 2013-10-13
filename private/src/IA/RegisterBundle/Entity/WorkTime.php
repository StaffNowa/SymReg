<?php

namespace IA\RegisterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WorkTime
 */
class WorkTime
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
     * @var \DateTime
     */
    private $work_time_start;

    /**
     * @var \DateTime
     */
    private $work_time_end;

    /**
     * @var string
     */
    private $breakfast;

    /**
     * @var array
     */
    private $data_json;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \IA\RegisterBundle\Entity\Pos
     */
    private $work_pos;

    /**
     * @var \IA\RegisterBundle\Entity\User
     */
    private $work_user;


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
     * @return WorkTime
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
     * @return WorkTime
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
     * Set work_time_start
     *
     * @param \DateTime $workTimeStart
     * @return WorkTime
     */
    public function setWorkTimeStart($workTimeStart)
    {
        $this->work_time_start = $workTimeStart;
    
        return $this;
    }

    /**
     * Get work_time_start
     *
     * @return \DateTime 
     */
    public function getWorkTimeStart()
    {
        return $this->work_time_start;
    }

    /**
     * Set work_time_end
     *
     * @param \DateTime $workTimeEnd
     * @return WorkTime
     */
    public function setWorkTimeEnd($workTimeEnd)
    {
        $this->work_time_end = $workTimeEnd;
    
        return $this;
    }

    /**
     * Get work_time_end
     *
     * @return \DateTime 
     */
    public function getWorkTimeEnd()
    {
        return $this->work_time_end;
    }

    /**
     * Set breakfast
     *
     * @param string $breakfast
     * @return WorkTime
     */
    public function setBreakfast($breakfast)
    {
        $this->breakfast = $breakfast;
    
        return $this;
    }

    /**
     * Get breakfast
     *
     * @return string 
     */
    public function getBreakfast()
    {
        return $this->breakfast;
    }

    /**
     * Set data_json
     *
     * @param array $dataJson
     * @return WorkTime
     */
    public function setDataJson($dataJson)
    {
        $this->data_json = $dataJson;
    
        return $this;
    }

    /**
     * Get data_json
     *
     * @return array 
     */
    public function getDataJson()
    {
        return $this->data_json;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return WorkTime
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return WorkTime
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set work_pos
     *
     * @param \IA\RegisterBundle\Entity\Pos $workPos
     * @return WorkTime
     */
    public function setWorkPos(\IA\RegisterBundle\Entity\Pos $workPos = null)
    {
        $this->work_pos = $workPos;
    
        return $this;
    }

    /**
     * Get work_pos
     *
     * @return \IA\RegisterBundle\Entity\Pos 
     */
    public function getWorkPos()
    {
        return $this->work_pos;
    }

    /**
     * Set work_user
     *
     * @param \IA\RegisterBundle\Entity\User $workUser
     * @return WorkTime
     */
    public function setWorkUser(\IA\RegisterBundle\Entity\User $workUser = null)
    {
        $this->work_user = $workUser;
    
        return $this;
    }

    /**
     * Get work_user
     *
     * @return \IA\RegisterBundle\Entity\User 
     */
    public function getWorkUser()
    {
        return $this->work_user;
    }
}
