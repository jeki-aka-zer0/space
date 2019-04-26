<?php

declare(strict_types=1);

namespace Api\Model\Text\Entity\Text;

interface TextRepository
{
    public function get(TextId $id): Text;
}
