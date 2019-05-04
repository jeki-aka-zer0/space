<?php

declare(strict_types=1);

namespace Api\Infrastructure\ReadModel\Text;

use Api\Infrastructure\Model\Status\Status;
use Api\Model\Text\Entity\Text\Text;
use Api\ReadModel\Text\TextReadRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

final class DoctrineTextReadRepository implements TextReadRepository
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

    public function all(): array
    {
        return $this->repo->createQueryBuilder('txt')
            ->andWhere('txt.status = :status')
            ->setParameter(':status', Status::ACTIVE)
            ->orderBy('txt.id', 'desc')
            ->getQuery()->getResult();
    }
}
