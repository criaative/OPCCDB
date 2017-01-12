<?php

namespace SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *  Description of Subcategorias
 *
 * @author Criaative
 * 
 * @ORM\Entity
 * @ORM\Table(name="subcategorias")
 */
class Subcategorias 
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
     * @ORM\ManyToOne(targetEntity="Produtos")
     * @ORM\JoinColumn(name="produtos_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $produtos;
    
    

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
     * @return Subcategorias
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
     * Set produtos
     *
     * @param \SistemaBundle\Entity\Produtos $produtos
     *
     * @return Subcategorias
     */
    public function setProdutos(\SistemaBundle\Entity\Produtos $produtos = null)
    {
        $this->produtos = $produtos;

        return $this;
    }

    /**
     * Get produtos
     *
     * @return \SistemaBundle\Entity\Produtos
     */
    public function getProdutos()
    {
        return $this->produtos;
    }
}
