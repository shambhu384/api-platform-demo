<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 *  @ApiResource(
 *     normalizationContext={"groups"={"read"}},
 *     denormalizationContext={"groups"={"write"}}
 * )
 *
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 * @UniqueEntity("username")
 * @UniqueEntity("email")
 * @UniqueEntity("confirmationToken")
 */
class Player extends User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $lastName;

    /**
     * @Groups({"read", "write"})
     */
    protected $username;

    /**
     * @Groups({"read", "write"})
     */
    protected $usernameCanonical;

    /**
     * @Groups({"read", "write"})
     */
    protected $email;

    /**
     * @Groups({"read", "write"})
     */
    protected $emailCanonical;

    /**
     * @Groups({"write"})
     */
    protected $enabled;

    /**
     * The salt to use for hashing.
     *
     * @Groups({"write"})
     */
    protected $salt;

    /**
     * Encrypted password. Must be persisted.
     *
     * @var string
     * @Groups({"write"})
     */
    protected $password;

    /**
     * Plain password. Used for model validation. Must not be persisted.
     *
     * @var string
     * @Groups({"write"})
     */
    protected $plainPassword;

    /**
     * @var \DateTime|null
     */
    protected $lastLogin;

    /**
     * Random string sent to the user email address in order to verify it.
     *
     * @var string|null
     * @Groups({"write"})
     */
    protected $confirmationToken;

    /**
     * @var \DateTime|null
     * @Groups({"write"})
     */
    protected $passwordRequestedAt;

    /**
     * @var GroupInterface[]|Collection
     * @Groups({"write"})
     */
    protected $groups;

    /**
     * @var array
     * @Groups({"write"})
     */
    protected $roles;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }
}
