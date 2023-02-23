<?php

namespace Entity;
use Attributes\Table;
use Attributes\TargetRepository;
use Repositories\AvisRepository;

#[Table(name: "avis")]
#[TargetRepository(repositoryName: AvisRepository::class)]
class Avis
{
    protected bool $avis;

    /**
     * @return bool
     */
    public function isAvis(): bool
    {
        return $this->avis;
    }

    /**
     * @param bool $avis
     */
    public function setAvis(bool $avis): void
    {
        $this->avis = $avis;
    }
}