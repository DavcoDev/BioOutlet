<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PanierRepository")
 */
class Panier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="numeroPanier", type="integer")
     */
    private $numeroPanier;

	/**
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="paniers")
	 */
	private $user;


	public function __toString()
	{
		return ''.$this->getNumeroPanier();
	}


	/**
	 * @return User
	 */
	public function getUser() {
		return $this->user;
	}

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numeroPanier
     *
     * @param integer $numeroPanier
     *
     * @return Panier
     */
    public function setNumeroPanier($numeroPanier)
    {
        $this->numeroPanier = $numeroPanier;

        return $this;
    }

    /**
     * Get numeroPanier
     *
     * @return int
     */
    public function getNumeroPanier()
    {
        return $this->numeroPanier;
    }
}

