<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitRepository")
 */
class Produit
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
     * @var string
     *
     * @ORM\Column(name="nomProduit", type="string", length=255)
     */
    private $nomProduit;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;


	public function __toString()
	{
		return $this->getNomProduit();
	}

	/**
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Panier", inversedBy="produitsPanier")
	 */
	private  $panier;

	/**
	 * @return Panier
	 */
	public function getPanier() {
		return $this->panier;
	}

	/**
	 * @param Panier $panier
	 */
	public function setPanier( $panier ) {
		$this->panier = $panier;
	}

	/**
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Producteur", inversedBy="produits")
	 */
	private $producteur;

	/**
	 * @return Producteur
	 */
	public function getProducteur() {
		return $this->producteur;
	}

	/**
	 * @param Producteur $producteur
	 */
	public function setProducteur( $producteur ) {
		$this->producteur = $producteur;
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
     * Set nomProduit
     *
     * @param string $nomProduit
     *
     * @return Produit
     */
    public function setNomProduit($nomProduit)
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    /**
     * Get nomProduit
     *
     * @return string
     */
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Produit
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
}

