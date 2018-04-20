<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Producteur
 *
 * @ORM\Table(name="producteur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProducteurRepository")
 */
class Producteur
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
     * @ORM\Column(name="nomProducteur", type="string", length=255)
     */
    private $nomProducteur;

    /**
     * @var string
     *
     * @ORM\Column(name="nomFerme", type="string", length=255)
     */
    private $nomFerme;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

	/**
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\Produit", mappedBy="producteur")
	 */
	private $produits;


	/**
	 * @return ArrayCollection | Produit[]
	 */
	public function getProduits() {
		return $this->produits;
	}

	public function __construct()
	{
		$this->produits = new ArrayCollection();
	}

	public function __toString() {
		return $this->getNomProducteur();
	}

	/**
	 * @param Produit $produits
	 */
	public function addProduit( $produits ) {
		if(!$this->produits->contains($produits)){
			$this->produits->add($produits);
		}

	}

	/**
	 * @param Produit $produits
	 */
	public function removeProduit( $produits ) {
		if(!$this->produits->contains($produits)){
			$this->produits->removeElement($produits);
		}

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
     * Set nomProducteur
     *
     * @param string $nomProducteur
     *
     * @return Producteur
     */
    public function setNomProducteur($nomProducteur)
    {
        $this->nomProducteur = $nomProducteur;

        return $this;
    }

    /**
     * Get nomProducteur
     *
     * @return string
     */
    public function getNomProducteur()
    {
        return $this->nomProducteur;
    }

    /**
     * Set nomFerme
     *
     * @param string $nomFerme
     *
     * @return Producteur
     */
    public function setNomFerme($nomFerme)
    {
        $this->nomFerme = $nomFerme;

        return $this;
    }

    /**
     * Get nomFerme
     *
     * @return string
     */
    public function getNomFerme()
    {
        return $this->nomFerme;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Producteur
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }
}

