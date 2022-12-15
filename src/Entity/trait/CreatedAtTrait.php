<?php
namespace App\Entity\trait;
use Doctrine\ORM\Mapping as ORM ;

trait CreatedAtTrait {

    #[ORM\Column(options: ['default'=>'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $created_at = null;

    public function getcreated_at(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setcreated_at(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}