<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Film;

#[TargetEntity(entityName: Film::class)]
class FilmRepository extends AbstractRepository
{

}