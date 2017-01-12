<?php

namespace SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *  Description of Categorias
 *
 * @author Criaative
 * 
 * @ORM\Entity
 * @ORM\Table(name="categorias")
 */
class Categorias 
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nome;

    /**
     * @ORM\ManyToOne(targetEntity="Subcategorias")
     * @ORM\JoinColumn(name="subcategorias_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $subcategorias;
    


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
     * Set nome
     *
     * @param string $nome
     *
     * @return Categorias
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set subcategorias
     *
     * @param \SistemaBundle\Entity\Subcategorias $subcategorias
     *
     * @return Categorias
     */
    public function setSubcategorias(\SistemaBundle\Entity\Subcategorias $subcategorias = null)
    {
        $this->subcategorias = $subcategorias;

        return $this;
    }

    /**
     * Get subcategorias
     *
     * @return \SistemaBundle\Entity\Subcategorias
     */
    public function getSubcategorias()
    {
        return $this->subcategorias;
    }
    
    public function __toString() 
    {
        return $this->id .'-'. $this->nome;
    }
}
