<?php

namespace IA\RegisterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pos
 */
class Pos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $organization_id;

    /**
     * @var integer
     */
    private $contact_info_id;

    /**
     * @var integer
     */
    private $country_id;

    /**
     * @var integer
     */
    private $city_id;

    /**
     * @var string
     */
    private $region;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pos_work;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pos_puser;

    /**
     * @var \IA\RegisterBundle\Entity\Organization
     */
    private $pos_org;

    /**
     * @var \IA\RegisterBundle\Entity\ContactInfo
     */
    private $pos_contact;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pos_work = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pos_puser = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set organization_id
     *
     * @param integer $organizationId
     * @return Pos
     */
    public function setOrganizationId($organizationId)
    {
        $this->organization_id = $organizationId;
    
        return $this;
    }

    /**
     * Get organization_id
     *
     * @return integer 
     */
    public function getOrganizationId()
    {
        return $this->organization_id;
    }

    /**
     * Set contact_info_id
     *
     * @param integer $contactInfoId
     * @return Pos
     */
    public function setContactInfoId($contactInfoId)
    {
        $this->contact_info_id = $contactInfoId;
    
        return $this;
    }

    /**
     * Get contact_info_id
     *
     * @return integer 
     */
    public function getContactInfoId()
    {
        return $this->contact_info_id;
    }

    /**
     * Set country_id
     *
     * @param integer $countryId
     * @return Pos
     */
    public function setCountryId($countryId)
    {
        $this->country_id = $countryId;
    
        return $this;
    }

    /**
     * Get country_id
     *
     * @return integer 
     */
    public function getCountryId()
    {
        return $this->country_id;
    }

    /**
     * Set city_id
     *
     * @param integer $cityId
     * @return Pos
     */
    public function setCityId($cityId)
    {
        $this->city_id = $cityId;
    
        return $this;
    }

    /**
     * Get city_id
     *
     * @return integer 
     */
    public function getCityId()
    {
        return $this->city_id;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Pos
     */
    public function setRegion($region)
    {
        $this->region = $region;
    
        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set data_json
     *
     * @param array $dataJson
     * @return Pos
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
     * @return Pos
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
     * @return Pos
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
     * Add pos_work
     *
     * @param \IA\RegisterBundle\Entity\WorkTime $posWork
     * @return Pos
     */
    public function addPosWork(\IA\RegisterBundle\Entity\WorkTime $posWork)
    {
        $this->pos_work[] = $posWork;
    
        return $this;
    }

    /**
     * Remove pos_work
     *
     * @param \IA\RegisterBundle\Entity\WorkTime $posWork
     */
    public function removePosWork(\IA\RegisterBundle\Entity\WorkTime $posWork)
    {
        $this->pos_work->removeElement($posWork);
    }

    /**
     * Get pos_work
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosWork()
    {
        return $this->pos_work;
    }

    /**
     * Add pos_puser
     *
     * @param \IA\RegisterBundle\Entity\PosUser $posPuser
     * @return Pos
     */
    public function addPosPuser(\IA\RegisterBundle\Entity\PosUser $posPuser)
    {
        $this->pos_puser[] = $posPuser;
    
        return $this;
    }

    /**
     * Remove pos_puser
     *
     * @param \IA\RegisterBundle\Entity\PosUser $posPuser
     */
    public function removePosPuser(\IA\RegisterBundle\Entity\PosUser $posPuser)
    {
        $this->pos_puser->removeElement($posPuser);
    }

    /**
     * Get pos_puser
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosPuser()
    {
        return $this->pos_puser;
    }

    /**
     * Set pos_org
     *
     * @param \IA\RegisterBundle\Entity\Organization $posOrg
     * @return Pos
     */
    public function setPosOrg(\IA\RegisterBundle\Entity\Organization $posOrg = null)
    {
        $this->pos_org = $posOrg;
    
        return $this;
    }

    /**
     * Get pos_org
     *
     * @return \IA\RegisterBundle\Entity\Organization 
     */
    public function getPosOrg()
    {
        return $this->pos_org;
    }

    /**
     * Set pos_contact
     *
     * @param \IA\RegisterBundle\Entity\ContactInfo $posContact
     * @return Pos
     */
    public function setPosContact(\IA\RegisterBundle\Entity\ContactInfo $posContact = null)
    {
        $this->pos_contact = $posContact;
    
        return $this;
    }

    /**
     * Get pos_contact
     *
     * @return \IA\RegisterBundle\Entity\ContactInfo 
     */
    public function getPosContact()
    {
        return $this->pos_contact;
    }

    public function __toString()
    {
        return (string)$this->getId();
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        if (!$this->getCreatedAt())
        {
            $this->created_at = new \DateTime();
        }
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updated_at = new \DateTime();
    }
}