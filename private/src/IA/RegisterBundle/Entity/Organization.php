<?php

namespace IA\RegisterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organization
 */
class Organization
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $org_name;

    /**
     * @var integer
     */
    private $country_id;

    /**
     * @var integer
     */
    private $city_id;

    /**
     * @var integer
     */
    private $contact_info_id;

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
    private $org_pos;

    /**
     * @var \IA\RegisterBundle\Entity\Contactinfo
     */
    private $org_contact;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->org_pos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set org_name
     *
     * @param string $orgName
     * @return Organization
     */
    public function setOrgName($orgName)
    {
        $this->org_name = $orgName;
    
        return $this;
    }

    /**
     * Get org_name
     *
     * @return string 
     */
    public function getOrgName()
    {
        return $this->org_name;
    }

    /**
     * Set country_id
     *
     * @param integer $countryId
     * @return Organization
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
     * @return Organization
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
     * Set contact_info_id
     *
     * @param integer $contactInfoId
     * @return Organization
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
     * Set data_json
     *
     * @param array $dataJson
     * @return Organization
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
     * @return Organization
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
     * @return Organization
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
     * Add org_pos
     *
     * @param \IA\RegisterBundle\Entity\Pos $orgPos
     * @return Organization
     */
    public function addOrgPo(\IA\RegisterBundle\Entity\Pos $orgPos)
    {
        $this->org_pos[] = $orgPos;
    
        return $this;
    }

    /**
     * Remove org_pos
     *
     * @param \IA\RegisterBundle\Entity\Pos $orgPos
     */
    public function removeOrgPo(\IA\RegisterBundle\Entity\Pos $orgPos)
    {
        $this->org_pos->removeElement($orgPos);
    }

    /**
     * Get org_pos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrgPos()
    {
        return $this->org_pos;
    }

    /**
     * Set org_contact
     *
     * @param \IA\RegisterBundle\Entity\Contactinfo $orgContact
     * @return Organization
     */
    public function setOrgContact(\IA\RegisterBundle\Entity\Contactinfo $orgContact = null)
    {
        $this->org_contact = $orgContact;
    
        return $this;
    }

    /**
     * Get org_contact
     *
     * @return \IA\RegisterBundle\Entity\Contactinfo 
     */
    public function getOrgContact()
    {
        return $this->org_contact;
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

    public function __toString()
    {
        return (string)$this->getOrgName();
    }
}