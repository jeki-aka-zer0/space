<?php

declare(strict_types=1);

namespace Api\Infrastructure\Model\Text\Entity;

use Api\Model\EntityNotFoundException;
use Api\Model\Text\Entity\Text\Text;
use Api\Model\Text\Entity\Text\TextId;
use Api\Model\Text\Entity\Text\TextRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

final class DoctrineTextRepository implements TextRepository
{
    /**
     * @var EntityRepository
     */
    private $repo;
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->repo = $em->getRepository(Text::class);
        $this->em = $em;
    }

    public function get(TextId $id): Text
    {
        /**
         * @var Text $text
         */
        $text = $this->repo->find($id->getId());

        if (null === $text) {
            throw new EntityNotFoundException('Text is not found.');
        }

        return $text;
    }
}
