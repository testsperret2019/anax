<?php

namespace Anaxago\CoreBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait IdAutoTrait
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Set id
     * @param integer $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }
}
