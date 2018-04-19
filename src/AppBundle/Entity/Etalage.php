<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Etalage
 *
 * @ORM\Table(name="etalage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtalageRepository")
 */
class Etalage
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

	/**
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Producteur", inversedBy="etalages")
	 */
	private  $producteur;

	/**
	 * @return mixed
	 */
	public function getProducteur() {
		return $this->producteur;
	}

	/**
	 * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Produit", mappedBy="etalages")
	 */
	private $produits;

	public function __construct(){
		$this->produits = new ArrayCollection();
	}

	public function __toString()
	{
		return $this->getName();
	}

	/**
	 * @return Produit
	 */
	public function getProduits() {
		return $this->produits;
	}

	/**
	 * @param Produit $produit
	 */
	public function addProduits( $produit ) {
		if(!$this->produits->contains($produit)){
			$this->produits->add($produit);
		}else{
//			$this->produits->removeElement($produit);
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
     * Set name
     *
     * @param string $name
     *
     * @return Etalage
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

