<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Results
 *
 * @ORM\Table(name="results", indexes={@ORM\Index(name="fk_results_users_idx", columns={"users_id"})})
 * @ORM\Entity
 */
class Results implements \JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="result", type="integer", nullable=true)
     */
    private $result;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=true)
     */
    private $time;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     * })
     */
    private $users;

    /**
     * Results constructor.
     * @param int $result
     * @param Users $users
     */
    public function __construct($result, Users $users)
    {
        $this->result = $result;
        $this->users = $users;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param int $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * @return DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param DateTime $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return Users
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param Users $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'user' => $this->getUsers(),
            'result' => $this->getResult(),
            'time'=> $this->getTime()
        ];

    }
}

