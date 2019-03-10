<?php declare(strict_types = 1);

namespace Anaxago\CoreBundle\DataFixtures\ORM;

use Anaxago\CoreBundle\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Anaxago\CoreBundle\Enum\Project\Status;

/**
 * Class ProjectFixtures
 * @package Anaxago\CoreBundle\DataFixtures\ORM
 */
class ProjectFixtures extends Fixture
{

    const SLUG_FUNDED_PROJECT   = 'de-vinci';
    const SLUG_NON_FUNDED_PROJECT_1   = 'nimoy';
    const SLUG_NON_FUNDED_PROJECT_2   = 'shield';

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getProjects() as $project) {
            $projectToPersist = (new Project())
                ->setTitle($project['name'])
                ->setStatus($project['status'])
                ->setAmountCeil($project['amountCeil'])
                ->setAmount($project['amount'])
                ->setDescription($project['description'])
                ->setSlug($project['slug']);
            $manager->persist($projectToPersist);
            $this->addReference(
                'project-'.$projectToPersist->getSlug(),
                $projectToPersist
            );
        }
        $manager->flush();
    }

    /**
     * @return array
     */
    public function getProjects(): array
    {
        return [
            [
                'name' => 'residence de vinci',
                'status' => Status::FUNDED,
                'amountCeil' => 1200000,
                'amount' => 1250000,
                'description' => 'une superbe copropriété pour vos vieux jours',
                'slug' => self::SLUG_FUNDED_PROJECT,
            ],
            [
                'name' => 'résidence leonard Nimoy',
                'status' => Status::NONFUNDED,
                'amountCeil' => 100000,
                'amount' => 99000,
                'description' => 'Un cadre futuriste pour les geeks aménagé pour accueillir toutes les espèces de la fédération des planètes',
                'slug' => self::SLUG_NON_FUNDED_PROJECT_1,
            ],
            [
                'name' => 'captain',
                'status' => Status::NONFUNDED,
                'amountCeil' => 110000,
                'amount' => 109000,
                'description' => 'Le lieu idéal pour super-héros pour trouver un répos bien mérité',
                'slug' => self::SLUG_NON_FUNDED_PROJECT_2,
            ],
        ];
    }

    public function getOrder()
    {
        return 1;
    }
}
