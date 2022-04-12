<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Echange
 *
 * @ORM\Table(name="echange", indexes={@ORM\Index(name="ech_user1", columns={"id_membre1"}), @ORM\Index(name="ech_art1", columns={"id_article1"}), @ORM\Index(name="ech_art2", columns={"id_article2"}), @ORM\Index(name="ech_usr2", columns={"id_membre2"})})
 * @ORM\Entity
 */
class Echange
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_echange", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEchange;

    /**
     * @var int
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_membre1", referencedColumnName="id_user")
     * })
     */
    private $idMembre1;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_article2", referencedColumnName="id")
     * })
     */
    private $idArticle2;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_membre2", referencedColumnName="id_user")
     * })
     */
    private $idMembre2;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_article1", referencedColumnName="id")
     * })
     */
    private $idArticle1;

    public function getIdEchange(): ?int
    {
        return $this->idEchange;
    }

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getIdMembre1(): ?User
    {
        return $this->idMembre1;
    }

    public function setIdMembre1(?User $idMembre1): self
    {
        $this->idMembre1 = $idMembre1;

        return $this;
    }

    public function getIdArticle2(): ?Article
    {
        return $this->idArticle2;
    }

    public function setIdArticle2(?Article $idArticle2): self
    {
        $this->idArticle2 = $idArticle2;

        return $this;
    }

    public function getIdMembre2(): ?User
    {
        return $this->idMembre2;
    }

    public function setIdMembre2(?User $idMembre2): self
    {
        $this->idMembre2 = $idMembre2;

        return $this;
    }

    public function getIdArticle1(): ?Article
    {
        return $this->idArticle1;
    }

    public function setIdArticle1(?Article $idArticle1): self
    {
        $this->idArticle1 = $idArticle1;

        return $this;
    }


}
