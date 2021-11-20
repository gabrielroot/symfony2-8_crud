<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produto
 *
 * @ORM\Table(name="produto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProdutoRepository")
 */
class Produto
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
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataCompra", type="date")
     */
    private $dataCompra;

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="float")
     */
    private $valor;


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
     * Set nome
     *
     * @param string $nome
     *
     * @return Produto
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
     * Set dataCompra
     *
     * @param \DateTime $dataCompra
     *
     * @return Produto
     */
    public function setDataCompra($dataCompra)
    {
        $this->dataCompra = $dataCompra;

        return $this;
    }

    /**
     * Get dataCompra
     *
     * @return \DateTime
     */
    public function getDataCompra()
    {
        return $this->dataCompra;
    }

    /**
     * Set valor
     *
     * @param float $valor
     *
     * @return Produto
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }
}

