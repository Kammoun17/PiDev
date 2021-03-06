<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity
 */
class Categorie
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
     * @ORM\Column(name="type_cat", type="integer", nullable=false)
     */
    private $typeCat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeCat(): ?int
    {
        return $this->typeCat;
    }

    public function setTypeCat(int $typeCat): self
    {
        $this->typeCat = $typeCat;

        return $this;
    }


}
