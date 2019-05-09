<?php

declare(strict_types=1);

namespace Api\Infrastructure\ReadModel\Job;

use Api\Infrastructure\Model\Status\Status;
use Api\Model\Language\Entity\Language\Code;
use Api\Model\Job\Entity\Job\Job;
use Api\ReadModel\Job\JobsReadRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

final class DoctrineJobsReadRepository implements JobsReadRepository
{
    /**
     * @var EntityRepository
     */
    private $repo;
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->repo = $em->getRepository(Job::class);
        $this->em = $em;
    }

    public function allActive(Code $language): array
    {
        return $this->repo->createQueryBuilder('jobs')
            ->andWhere('jobs.status = :status AND jobs.language = :language_code')
            ->setParameters([
                ':status' => Status::ACTIVE,
                ':language_code' => $language->getCode()
            ])
            ->orderBy('jobs.sort', 'asc')
            ->getQuery()->getResult();
    }
}
