<?php declare(strict_types = 1);

namespace Anaxago\CoreBundle\DataFixtures\ORM;

use ProjectFixtures;
use UserFixtures;

/**
 * Class ProjectFixtures
 * @package Anaxago\CoreBundle\DataFixtures\ORM
 */
class InterestFixtures extends Fixture
{

    /**
     * @return array
     */
    public function getInterest(): array
    {
        return [

            [
                'user' => $this->getReference('user-'.UserFixtures::EMAIL_JOHN),
                'project' => $this->getReference('project-'.ProjectFixtures::SLUG_FUNDED_PROJECT),
                'amount' => 50000
            ],
            [
                'user' => $this->getReference('user-'.UserFixtures::EMAIL_MARYLIN),
                'project' => $this->getReference('project-'.ProjectFixtures::SLUG_FUNDED_PROJECT),
                'amount' => 1200000
            ],

            [
                'user' => $this->getReference('user-'.UserFixtures::EMAIL_JOHN),
                'project' => $this->getReference('project-'.ProjectFixtures::SLUG_NON_FUNDED_PROJECT_1),
                'amount' => 98000
            ],
            [
                'user' => $this->getReference('user-'.UserFixtures::EMAIL_MARYLIN),
                'project' => $this->getReference('project-'.ProjectFixtures::SLUG_NON_FUNDED_PROJECT_1),
                'amount' => 1000
            ],

            [
                'user' => $this->getReference('user-'.UserFixtures::EMAIL_JOHN),
                'project' => $this->getReference('project-'.ProjectFixtures::SLUG_NON_FUNDED_PROJECT_1),
                'amount' => 100000
            ],
            [
                'user' => $this->getReference('user-'.UserFixtures::EMAIL_MARYLIN),
                'project' => $this->getReference('project-'.ProjectFixtures::SLUG_NON_FUNDED_PROJECT_1),
                'amount' => 9000
            ],
        ];
    }

    public function getOrder()
    {
        return 2;
    }
}
