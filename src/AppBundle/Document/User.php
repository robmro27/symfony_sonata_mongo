<?php

namespace AppBundle\Document;

//use Sonata\UserBundle\Document\BaseUser as BaseUser;
use FOS\UserBundle\Document\User as BaseUser;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use AppBundle\Model\UserInterface;

/**
 * @MongoDB\Document(collection="users")
 */
class User extends BaseUser
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Group")
     */
    protected $groups;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Get id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @var \DateTime
     * @MongoDB\Timestamp
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @MongoDB\Timestamp
     */
    protected $updatedAt;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $twoStepVerificationCode;

    /**
     * @var \DateTime
     * @MongoDB\Timestamp
     */
    protected $dateOfBirth;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $firstname;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $lastname;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $website;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $biography;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $gender = UserInterface::GENDER_UNKNOWN; // set the default to unknown

    /**
     * @var string
     * @MongoDB\String
     */
    protected $locale;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $timezone;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $phone;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $facebookUid;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $facebookName;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $facebookData;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $twitterUid;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $twitterName;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $twitterData;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $gplusUid;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $gplusName;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $gplusData;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $token;

    /**
     * Sets the creation date
     *
     * @param \DateTime|null $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns the creation date
     *
     * @return \DateTime|null
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets the last update date
     *
     * @param \DateTime|null $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns the last update date
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Returns the expiration date
     *
     * @return \DateTime|null
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Returns the credentials expiration date
     *
     * @return \DateTime
     */
    public function getCredentialsExpireAt()
    {
        return $this->credentialsExpireAt;
    }

    /**
     * Sets the credentials expiration date
     *
     * @param \DateTime|null $date
     */
    public function setCredentialsExpireAt(\DateTime $date = null)
    {
        $this->credentialsExpireAt = $date;
    }

    /**
     * Returns a string representation
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getUsername() ?: '-';
    }

    /**
     * Sets the user groups
     *
     * @param array $groups
     */
    public function setGroups($groups)
    {
        foreach ($groups as $group) {
            $this->addGroup($group);
        }
    }

    /**
     * Sets the two-step verification code
     *
     * @param string $twoStepVerificationCode
     */
    public function setTwoStepVerificationCode($twoStepVerificationCode)
    {
        $this->twoStepVerificationCode = $twoStepVerificationCode;
    }

    /**
     * Returns the two-step verification code
     *
     * @return string
     */
    public function getTwoStepVerificationCode()
    {
        return $this->twoStepVerificationCode;
    }

    /**
     * @param string $biography
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;
    }

    /**
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @param \DateTime $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param string $facebookData
     */
    public function setFacebookData($facebookData)
    {
        $this->facebookData = $facebookData;
    }

    /**
     * @return string
     */
    public function getFacebookData()
    {
        return $this->facebookData;
    }

    /**
     * @param string $facebookName
     */
    public function setFacebookName($facebookName)
    {
        $this->facebookName = $facebookName;
    }

    /**
     * @return string
     */
    public function getFacebookName()
    {
        return $this->facebookName;
    }

    /**
     * @param string $facebookUid
     */
    public function setFacebookUid($facebookUid)
    {
        $this->facebookUid = $facebookUid;
    }

    /**
     * @return string
     */
    public function getFacebookUid()
    {
        return $this->facebookUid;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gplusData
     */
    public function setGplusData($gplusData)
    {
        $this->gplusData = $gplusData;
    }

    /**
     * @return string
     */
    public function getGplusData()
    {
        return $this->gplusData;
    }

    /**
     * @param string $gplusName
     */
    public function setGplusName($gplusName)
    {
        $this->gplusName = $gplusName;
    }

    /**
     * @return string
     */
    public function getGplusName()
    {
        return $this->gplusName;
    }

    /**
     * @param string $gplusUid
     */
    public function setGplusUid($gplusUid)
    {
        $this->gplusUid = $gplusUid;
    }

    /**
     * @return string
     */
    public function getGplusUid()
    {
        return $this->gplusUid;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param string $twitterData
     */
    public function setTwitterData($twitterData)
    {
        $this->twitterData = $twitterData;
    }

    /**
     * @return string
     */
    public function getTwitterData()
    {
        return $this->twitterData;
    }

    /**
     * @param string $twitterName
     */
    public function setTwitterName($twitterName)
    {
        $this->twitterName = $twitterName;
    }

    /**
     * @return string
     */
    public function getTwitterName()
    {
        return $this->twitterName;
    }

    /**
     * @param string $twitterUid
     */
    public function setTwitterUid($twitterUid)
    {
        $this->twitterUid = $twitterUid;
    }

    /**
     * @return string
     */
    public function getTwitterUid()
    {
        return $this->twitterUid;
    }

    /**
     * @param string $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return sprintf("%s %s", $this->getFirstname(), $this->getLastname());
    }

    /**
     * @return array
     */
    public function getRealRoles()
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRealRoles(array $roles)
    {
        $this->setRoles($roles);
    }

    /**
     * Hook on pre-persist operations
     */
    public function prePersist()
    {
        $this->createdAt = new \DateTime;
        $this->updatedAt = new \DateTime;
    }

    /**
     * Hook on pre-update operations
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime;
    }

    /**
     * Returns the gender list
     *
     * @return array
     */
    public static function getGenderList()
    {
        return array(
            UserInterface::GENDER_UNKNOWN => 'gender_unknown',
            UserInterface::GENDER_FEMALE  => 'gender_female',
            UserInterface::GENDER_MALE    => 'gender_male',
        );
    }
}