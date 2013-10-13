<?php

namespace IA\RegisterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactInfo
 */
class ContactInfo
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $tel;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $www_address;

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var string
     */
    private $personal_code;

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
    private $contact_pos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contact_booking;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contact_org;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contact_user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contact_pos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contact_booking = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contact_org = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contact_user = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set address
     *
     * @param string $address
     * @return ContactInfo
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return ContactInfo
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return ContactInfo
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    
        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return ContactInfo
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set www_address
     *
     * @param string $wwwAddress
     * @return ContactInfo
     */
    public function setWwwAddress($wwwAddress)
    {
        $this->www_address = $wwwAddress;
    
        return $this;
    }

    /**
     * Get www_address
     *
     * @return string 
     */
    public function getWwwAddress()
    {
        return $this->www_address;
    }

    /**
     * Set first_name
     *
     * @param string $firstName
     * @return ContactInfo
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    
        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return ContactInfo
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
    
        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set personal_code
     *
     * @param string $personalCode
     * @return ContactInfo
     */
    public function setPersonalCode($personalCode)
    {
        $this->personal_code = $personalCode;
    
        return $this;
    }

    /**
     * Get personal_code
     *
     * @return string 
     */
    public function getPersonalCode()
    {
        return $this->personal_code;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return ContactInfo
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
     * @return ContactInfo
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
     * Add contact_pos
     *
     * @param \IA\RegisterBundle\Entity\Pos $contactPos
     * @return ContactInfo
     */
    public function addContactPo(\IA\RegisterBundle\Entity\Pos $contactPos)
    {
        $this->contact_pos[] = $contactPos;
    
        return $this;
    }

    /**
     * Remove contact_pos
     *
     * @param \IA\RegisterBundle\Entity\Pos $contactPos
     */
    public function removeContactPo(\IA\RegisterBundle\Entity\Pos $contactPos)
    {
        $this->contact_pos->removeElement($contactPos);
    }

    /**
     * Get contact_pos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactPos()
    {
        return $this->contact_pos;
    }

    /**
     * Add contact_booking
     *
     * @param \IA\RegisterBundle\Entity\Booking $contactBooking
     * @return ContactInfo
     */
    public function addContactBooking(\IA\RegisterBundle\Entity\Booking $contactBooking)
    {
        $this->contact_booking[] = $contactBooking;
    
        return $this;
    }

    /**
     * Remove contact_booking
     *
     * @param \IA\RegisterBundle\Entity\Booking $contactBooking
     */
    public function removeContactBooking(\IA\RegisterBundle\Entity\Booking $contactBooking)
    {
        $this->contact_booking->removeElement($contactBooking);
    }

    /**
     * Get contact_booking
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactBooking()
    {
        return $this->contact_booking;
    }

    /**
     * Add contact_org
     *
     * @param \IA\RegisterBundle\Entity\Organization $contactOrg
     * @return ContactInfo
     */
    public function addContactOrg(\IA\RegisterBundle\Entity\Organization $contactOrg)
    {
        $this->contact_org[] = $contactOrg;
    
        return $this;
    }

    /**
     * Remove contact_org
     *
     * @param \IA\RegisterBundle\Entity\Organization $contactOrg
     */
    public function removeContactOrg(\IA\RegisterBundle\Entity\Organization $contactOrg)
    {
        $this->contact_org->removeElement($contactOrg);
    }

    /**
     * Get contact_org
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactOrg()
    {
        return $this->contact_org;
    }

    /**
     * Add contact_user
     *
     * @param \IA\RegisterBundle\Entity\User $contactUser
     * @return ContactInfo
     */
    public function addContactUser(\IA\RegisterBundle\Entity\User $contactUser)
    {
        $this->contact_user[] = $contactUser;
    
        return $this;
    }

    /**
     * Remove contact_user
     *
     * @param \IA\RegisterBundle\Entity\User $contactUser
     */
    public function removeContactUser(\IA\RegisterBundle\Entity\User $contactUser)
    {
        $this->contact_user->removeElement($contactUser);
    }

    /**
     * Get contact_user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactUser()
    {
        return $this->contact_user;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        if ( !$this->getCreatedAt() )
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
        if ($this->first_name == '' && $this->last_name == '')
        {
            return (string)$this->getId();
        }
        return (string)$this->getFirstName() . ' ' . $this->getLastName();
    }
}