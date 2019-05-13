<?php

declare(strict_types=1);

namespace Api\Infrastructure\ReadModel\Language;

use Api\Infrastructure\Model\Status\Status;
use Api\Model\Language\Entity\Language\Code;
use Api\Model\Language\Entity\Language\Language;
use Api\ReadModel\Language\LanguageReadRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

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

    public function allActive(): array
    {
        return $this->repo->createQueryBuilder('lng')
            ->andWhere('lng.status = :status')
            ->setParameter(':status', Status::ACTIVE)
            ->orderBy('lng.sort', 'asc')
            ->getQuery()->getResult();
    }

    /**
     * @param Code $code
     * @return Language
     * @throws NonUniqueResultException
     * @throws NoResultException
     */
    public function getByCode(Code $code): Language
    {
        return $this->repo->createQueryBuilder('lng')
            ->andWhere('lng.code = :code')
            ->setParameter(':code', $code->getCode())
            ->getQuery()->getSingleResult();
    }
}
