<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Carts
 *
 * @ORM\Table(name="carts", indexes={@ORM\Index(name="carts_users_FK", columns={"user_id"})})
 * @ORM\Entity
 */
class Carts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="add_date_time", type="datetime", nullable=true)
     */
    private $addDateTime;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Dishes", mappedBy="cart")
     */
    private $dish;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dish = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddDateTime(): ?\DateTimeInterface
    {
        return $this->addDateTime;
    }

    public function setAddDateTime(?\DateTimeInterface $addDateTime): self
    {
        $this->addDateTime = $addDateTime;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Dishes[]
     */
    public function getDish(): Collection
    {
        return $this->dish;
    }

    public function addDish(Dishes $dish): self
    {
        if (!$this->dish->contains($dish)) {
            $this->dish[] = $dish;
            $dish->addCart($this);
        }

        return $this;
    }

    public function removeDish(Dishes $dish): self
    {
        if ($this->dish->contains($dish)) {
            $this->dish->removeElement($dish);
            $dish->removeCart($this);
        }

        return $this;
    }

}
