<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="art_cat", columns={"id_categorie"}), @ORM\Index(name="art_boost", columns={"boost"}), @ORM\Index(name="id_Gouvernorat", columns={"id_Gouvernorat"}), @ORM\Index(name="art_user", columns={"id_proprietaire"})})
 * @ORM\Entity
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="echange_cross_cat", type="integer", nullable=false)
     */
    private $echangeCrossCat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_publication", type="date", nullable=false)
     */
    private $datePublication;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proprietaire", referencedColumnName="id_user")
     * })
     */
    private $idProprietaire;

    /**
     * @var \CategorieArticle
     *
     * @ORM\ManyToOne(targetEntity="CategorieArticle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_categorie", referencedColumnName="id")
     * })
     */
    private $idCategorie;

    /**
     * @var \Gouvernorat
     *
     * @ORM\ManyToOne(targetEntity="Gouvernorat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Gouvernorat", referencedColumnName="id_Gouvernorat")
     * })
     */
    private $idGouvernorat;

    /**
     * @var \Boost
     *
     * @ORM\ManyToOne(targetEntity="Boost")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="boost", referencedColumnName="id_boost")
     * })
     */
    private $boost;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEchangeCrossCat(): ?int
    {
        return $this->echangeCrossCat;
    }

    public function setEchangeCrossCat(int $echangeCrossCat): self
    {
        $this->echangeCrossCat = $echangeCrossCat;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->datePublication;
    }

    public function setDatePublication(\DateTimeInterface $datePublication): self
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIdProprietaire(): ?User
    {
        return $this->idProprietaire;
    }

    public function setIdProprietaire(?User $idProprietaire): self
    {
        $this->idProprietaire = $idProprietaire;

        return $this;
    }

    public function getIdCategorie(): ?CategorieArticle
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?CategorieArticle $idCategorie): self
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }

    public function getIdGouvernorat(): ?Gouvernorat
    {
        return $this->idGouvernorat;
    }

    public function setIdGouvernorat(?Gouvernorat $idGouvernorat): self
    {
        $this->idGouvernorat = $idGouvernorat;

        return $this;
    }

    public function getBoost(): ?Boost
    {
        return $this->boost;
    }

    public function setBoost(?Boost $boost): self
    {
        $this->boost = $boost;

        return $this;
    }


}
