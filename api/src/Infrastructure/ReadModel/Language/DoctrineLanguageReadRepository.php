<?php

declare(strict_types=1);

namespace Api\Infrastructure\ReadModel\Language;

use Api\Infrastructure\Model\Status\Status;
use Api\Model\Language\Entity\Language\Language;
use Api\ReadModel\Language\LanguageReadRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

final class DoctrineLanguageReadRepository implements LanguageReadRepository
{
    /**
     * @var EntityRepository
     */
    private $repo;
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->repo = $em->getRepository(Language::class);
        $this->em = $em;
    }

    public function all(): array
    {
        return $this->repo->createQueryBuilder('lng')
            ->andWhere('lng.status = :status')
            ->setParameter(':status', Status::ACTIVE)
            ->orderBy('lng.sort', 'desc')
            ->getQuery()->getResult();
    }
}
