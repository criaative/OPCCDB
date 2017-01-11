<?php

namespace SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *  Description of Produtos
 *
 * @author Criaative
 * 
 * @ORM\Entity
 * @ORM\Table(name="produtos")
 */
class Produtos 
{
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=6)
     */
    private $codigo;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nome;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $preco;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descricao;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categoria;
    
    /**
     * @ORM\Column(type="integer", length=6)
     */
    private $largura;
    
    /**
     * @ORM\Column(type="integer", length=6)
     */
    private $comprimento;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $imagem;


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
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Produtos
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Produtos
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
     * Set preco
     *
     * @param string $preco
     *
     * @return Produtos
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }

    /**
     * Get preco
     *
     * @return string
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Produtos
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set categoria
     *
     * @param string $categoria
     *
     * @return Produtos
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set largura
     *
     * @param integer $largura
     *
     * @return Produtos
     */
    public function setLargura($largura)
    {
        $this->largura = $largura;

        return $this;
    }

    /**
     * Get largura
     *
     * @return integer
     */
    public function getLargura()
    {
        return $this->largura;
    }

    /**
     * Set comprimento
     *
     * @param integer $comprimento
     *
     * @return Produtos
     */
    public function setComprimento($comprimento)
    {
        $this->comprimento = $comprimento;

        return $this;
    }

    /**
     * Get comprimento
     *
     * @return integer
     */
    public function getComprimento()
    {
        return $this->comprimento;
    }

    /**
     * Set imagem
     *
     * @param string $imagem
     *
     * @return Produtos
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }

    /**
     * Get imagem
     *
     * @return string
     */
    public function getImagem()
    {
        return $this->imagem;
    }
}
