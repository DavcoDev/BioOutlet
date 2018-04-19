<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\Produit", mappedBy="panier")
	 */
	private $produits;

	/**
	 * @return ArrayCollection | Produit[]
	 */
	public function getProduits() {
		return $this->produits;
	}


	public function __construct(){
		$this->produits = new ArrayCollection();
	}


	/**
	 * @param Produit $produits
	 */
	public function addProduit( $produits ) {
		if(!$this->produits->contains($produits)){
			$this->produits->add($produits);
		}
		//else{
//			$this->produits->removeElement($produits);
		//}
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

