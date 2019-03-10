<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 12/07/18
 * Time: 17:33
 */

namespace Anaxago\CoreBundle\DataFixtures\ORM;

use Anaxago\CoreBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    const EMAIL_JOHN   = 'john@local.com';
    const EMAIL_MARYLIN = 'marilyn@local.com';
    const EMAIL_JACKIE = 'jackie@local.com';
    const EMAIL_ADMIN  = 'admin@local.com';

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $john = (new User())
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setEmail(self::EMAIL_JOHN)
            ->setPlainPassword('john');
        $this->addReference(
           'user-'.$john->getEmail(),
            $john
        );
        $manager->persist($john);

        $marilyn = (new User())
            ->setFirstName('Marilyn')
            ->setLastName('Monroe')
            ->setEmail(self::EMAIL_MARYLIN)
            ->setPlainPassword('marilyn');
        $this->addReference(
           'user-'.$marilyn->getEmail(),
            $marilyn
        );
        $manager->persist($marilyn);

        $jackie = (new User())
            ->setFirstName('Jackie')
            ->setLastName('Kennedy')
            ->setEmail(self::EMAIL_JACKIE)
            ->setPlainPassword('jackie');
        $this->addReference(
           'user-'.$jackie->getEmail(),
            $jackie
        );
        $manager->persist($jackie);

        $admin = (new User())
            ->setFirstName('admin')
            ->setLastName('anaxago')
            ->setEmail(self::EMAIL_ADMIN)
            ->setPlainPassword('admin')
            ->addRoles('ROLE_ADMIN')
        ;
        $this->addReference(
           'user-'.$admin->getEmail(),
            $admin
        );
        $manager->persist($admin);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
