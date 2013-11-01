<?php

namespace IA\RegisterBundle\Entity;

use Doctrine\Common\Util\Debug;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

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
    private $user_work;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $user_puser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $user_booking;

    /**
     * @var \IA\RegisterBundle\Entity\ContactInfo
     */
    private $user_contact;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $roles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user_work = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user_puser = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user_booking = new \Doctrine\Common\Collections\ArrayCollection();
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set contact_info_id
     *
     * @param integer $contactInfoId
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * Add user_work
     *
     * @param \IA\RegisterBundle\Entity\WorkTime $userWork
     * @return User
     */
    public function addUserWork(\IA\RegisterBundle\Entity\WorkTime $userWork)
    {
        $this->user_work[] = $userWork;

        return $this;
    }

    /**
     * Remove user_work
     *
     * @param \IA\RegisterBundle\Entity\WorkTime $userWork
     */
    public function removeUserWork(\IA\RegisterBundle\Entity\WorkTime $userWork)
    {
        $this->user_work->removeElement($userWork);
    }

    /**
     * Get user_work
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserWork()
    {
        return $this->user_work;
    }

    /**
     * Add user_puser
     *
     * @param \IA\RegisterBundle\Entity\PosUser $userPuser
     * @return User
     */
    public function addUserPuser(\IA\RegisterBundle\Entity\PosUser $userPuser)
    {
        $this->user_puser[] = $userPuser;

        return $this;
    }

    /**
     * Remove user_puser
     *
     * @param \IA\RegisterBundle\Entity\PosUser $userPuser
     */
    public function removeUserPuser(\IA\RegisterBundle\Entity\PosUser $userPuser)
    {
        $this->user_puser->removeElement($userPuser);
    }

    /**
     * Get user_puser
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserPuser()
    {
        return $this->user_puser;
    }

    /**
     * Add user_booking
     *
     * @param \IA\RegisterBundle\Entity\Booking $userBooking
     * @return User
     */
    public function addUserBooking(\IA\RegisterBundle\Entity\Booking $userBooking)
    {
        $this->user_booking[] = $userBooking;

        return $this;
    }

    /**
     * Remove user_booking
     *
     * @param \IA\RegisterBundle\Entity\Booking $userBooking
     */
    public function removeUserBooking(\IA\RegisterBundle\Entity\Booking $userBooking)
    {
        $this->user_booking->removeElement($userBooking);
    }

    /**
     * Get user_booking
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserBooking()
    {
        return $this->user_booking;
    }

    /**
     * Set user_contact
     *
     * @param \IA\RegisterBundle\Entity\ContactInfo $userContact
     * @return User
     */
    public function setUserContact(\IA\RegisterBundle\Entity\ContactInfo $userContact = null)
    {
        $this->user_contact = $userContact;

        return $this;
    }

    /**
     * Get user_contact
     *
     * @return \IA\RegisterBundle\Entity\ContactInfo
     */
    public function getUserContact()
    {
        return $this->user_contact;
    }

//    /**
//     * Add roles
//     *
//     * @param \IA\RegisterBundle\Entity\Role $roles
//     * @return User
//     */
//    public function addRole(\IA\RegisterBundle\Entity\Role $roles)
//    {
//        $this->roles[] = $roles;
//
//        return $this;
//    }

//    /**
//     * Remove roles
//     *
//     * @param \IA\RegisterBundle\Entity\Role $roles
//     */
//    public function removeRole(\IA\RegisterBundle\Entity\Role $roles)
//    {
//        $this->roles->removeElement($roles);
//    }

    /**
     * Returns an array of Role objects with the default Role object appended.
     * @return array
     */
    public function getRoles()
    {
        return $this->roles->toArray();
//        return array_merge(
//            $this->roles->toArray(), array(
//                new Role(parent::ROLE_DEFAULT)
//            )
//        );
    }

    /**
     * Returns the true ArrayCollection of Roles.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRolesCollection()
    {
        return $this->roles;
//        return $this->roles->toArray();
    }

    /**
     * Pass a string, get the desired Role object or null.
     * @param string $role
     * @return Role|null
     */
    public function getRole($role)
    {
        foreach($this->getRoles() as $roleItem)
        {
            if ($role == $roleItem->getRole())
            {
                return $roleItem;
            }
        }
        return null;
    }

    /**
     * Pass a string, checks if we have that Role. Same functionality as getRole() except returns a real boolean.
     * @param string $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if ($this->getRole($role))
        {
            return true;
        }
        return false;
    }

    /**
     * Adds a Role object to the ArrayCollection. Can't type hint due to interface so throws Exception.
     * @throws Exception
     * @param Role $role
     */
    public function addRole($role)
    {
        if (!$role instanceof Role)
        {
            throw new \Exception( "addRole takes a Role object as the parameter" );
        }

        if (!$this->hasRole( $role->getRole()))
        {
            $this->roles->add($role);
        }
    }

    /**
     * Pass a string, remove the Role object from collection.
     * @param string $role
     */
    public function removeRole($role)
    {
        $roleElement = $this->getRole($role);
        if ($roleElement)
        {
            $this->roles->removeElement($roleElement);
        }
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {

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
    /**
     * @var string
     */
    private $salt;


    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @see \Serializable::serialize()
     * ! Don't serialize $roles field
     */
    public function serialize()
    {
        return serialize(array(
            $this->id
//            , $this->username
//            , $this->email
//            , $this->salt
//            , $this->password
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id
//            , $this->username
//            , $this->email
//            , $this->salt
//            , $this->password
            ) = unserialize($serialized);
    }

    public function __toString()
    {
        return (string)$this->getUsername();
    }

    /**
     * Pass an array of Role objects and will clear the collection and re-set it with new Roles.
     * Type hinted array due to interface.
     * @param array $roles of Role objects
     */
    public function setRoles(array $roles)
    {
        $this->roles->clear();
        foreach($roles as $role)
        {
            $this->addRole($role);
        }
    }

//    /**
//     * Directly set the ArrayCollection of Roles. Type hinted as Collection which is the parent of (Array|Persistent)Collection.
//     * @param Doctrine\Common\Collections\Collection $role
//     */
//    public function setRolesCollection(Collection $collection)
//    {
//        $this->roles = $collection;
//    }

    public function setUserRoles($userRoles)
    {
        debugvar($userRoles);
        if (is_array($userRoles))
        {
            $this->roles = $userRoles;
        }
        else
        {
            $this->roles->clear();
            if (!$this->roles->contains($userRoles))
            {
                $this->roles->add($userRoles);
            }
        }
        return $this;
    }

}