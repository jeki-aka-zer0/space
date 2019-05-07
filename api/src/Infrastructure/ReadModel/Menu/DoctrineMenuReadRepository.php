<?php

declare(strict_types=1);

namespace Api\Infrastructure\ReadModel\Menu;

use Api\Infrastructure\Model\Status\Status;
use Api\Model\Language\Entity\Language\Code;
use Api\Model\Menu\Entity\Item\Menu;
use Api\ReadModel\Menu\MenuReadRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

final class DoctrineMenuReadRepository implements MenuReadRepository
{
    /**
     * @var EntityRepository
     */
    private $repo;
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->repo = $em->getRepository(Menu::class);
        $this->em = $em;
    }

    public function allActive(Code $language): array
    {
        return $this->repo->createQueryBuilder('menu')
            ->andWhere('menu.status = :status AND menu.language = :language_code')
            ->setParameters([
                ':status' => Status::ACTIVE,
                ':language_code' => $language->getCode()
            ])
            ->orderBy('menu.sort', 'asc')
            ->getQuery()->getResult();
    }
}
