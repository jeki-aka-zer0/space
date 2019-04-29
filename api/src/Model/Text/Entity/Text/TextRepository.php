<?php

declare(strict_types=1);

namespace Api\Model\Text\Entity\Text;

use Api\Infrastructure\Model\Id\Id;

interface TextRepository
{
    public function get(Id $id): Text;
}
