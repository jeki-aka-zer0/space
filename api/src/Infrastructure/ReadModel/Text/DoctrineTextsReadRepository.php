<?php

declare(strict_types=1);

namespace Api\Infrastructure\ReadModel\Text;

use Api\Infrastructure\Model\Status\Status;
use Api\Model\Language\Entity\Language\Code;
use Api\Model\Text\Entity\Text\Text;
use Api\ReadModel\Text\TextsReadRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

final class DoctrineTextsReadRepository implements TextsReadRepository
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

    public function all(Code $language): array
    {
        return $this->repo->createQueryBuilder('txt')
            ->andWhere('txt.status = :status AND txt.language = :language_code')
            ->setParameters([
                ':status' => Status::ACTIVE,
                ':language_code' => $language->getCode()
            ])
            ->orderBy('txt.id', 'desc')
            ->getQuery()->getResult();
    }
}
