<?php

namespace IA\RegisterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 */
class Booking
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $order_number;

    /**
     * @var integer
     */
    private $order_salesman;

    /**
     * @var integer
     */
    private $contact_info_id;

    /**
     * @var string
     */
    private $additional_info;

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
     * @var \IA\RegisterBundle\Entity\User
     */
    private $booking_user;

    /**
     * @var \IA\RegisterBundle\Entity\ContactInfo
     */
    private $booking_contact;


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
     * Set order_number
     *
     * @param string $orderNumber
     * @return Booking
     */
    public function setOrderNumber($orderNumber)
    {
        $this->order_number = $orderNumber;
    
        return $this;
    }

    /**
     * Get order_number
     *
     * @return string 
     */
    public function getOrderNumber()
    {
        return $this->order_number;
    }

    /**
     * Set order_salesman
     *
     * @param integer $orderSalesman
     * @return Booking
     */
    public function setOrderSalesman($orderSalesman)
    {
        $this->order_salesman = $orderSalesman;
    
        return $this;
    }

    /**
     * Get order_salesman
     *
     * @return integer 
     */
    public function getOrderSalesman()
    {
        return $this->order_salesman;
    }

    /**
     * Set contact_info_id
     *
     * @param integer $contactInfoId
     * @return Booking
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
     * Set additional_info
     *
     * @param string $additionalInfo
     * @return Booking
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additional_info = $additionalInfo;
    
        return $this;
    }

    /**
     * Get additional_info
     *
     * @return string 
     */
    public function getAdditionalInfo()
    {
        return $this->additional_info;
    }

    /**
     * Set data_json
     *
     * @param array $dataJson
     * @return Booking
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
     * @return Booking
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
     * @return Booking
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
     * Set booking_user
     *
     * @param \IA\RegisterBundle\Entity\User $bookingUser
     * @return Booking
     */
    public function setBookingUser(\IA\RegisterBundle\Entity\User $bookingUser = null)
    {
        $this->booking_user = $bookingUser;
    
        return $this;
    }

    /**
     * Get booking_user
     *
     * @return \IA\RegisterBundle\Entity\User 
     */
    public function getBookingUser()
    {
        return $this->booking_user;
    }

    /**
     * Set booking_contact
     *
     * @param \IA\RegisterBundle\Entity\ContactInfo $bookingContact
     * @return Booking
     */
    public function setBookingContact(\IA\RegisterBundle\Entity\ContactInfo $bookingContact = null)
    {
        $this->booking_contact = $bookingContact;
    
        return $this;
    }

    /**
     * Get booking_contact
     *
     * @return \IA\RegisterBundle\Entity\ContactInfo 
     */
    public function getBookingContact()
    {
        return $this->booking_contact;
    }
}
