<?php
namespace App\Entity\trait;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM ;

trait CreatedAtTrait {

    #[ORM\Column(type: 'datetime_immutable',options: ['default'=>'CURRENT_TIMESTAMP'])]
    private ?DateTimeImmutable $createdAt ;

    public function getcreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setcreatedAt(DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}


