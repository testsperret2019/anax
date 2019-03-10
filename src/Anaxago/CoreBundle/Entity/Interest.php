<?php

namespace Anaxago\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Anaxago\CoreBundle\Entity\Traits\IdAutoTrait;
use Anaxago\CoreBundle\Entity\Traits\AmountTrait;
use Anaxago\CoreBundle\Entity\User;
use Anaxago\CoreBundle\Entity\Project;

/**
 * Interest
 *
 * @ORM\Table(name="Interest")
 */
class Interest
{
    use IdAutoTrait, AmountTrait;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToOne(targetEntity="\Anaxago\CoreBundle\Entity\User", mappedBy="user", cascade={"persist","remove"}, orphanRemoval=true)
     */
    protected $user;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToOne(targetEntity="\Anaxago\CoreBundle\Entity\Project", mappedBy="project", cascade={"persist","remove"}, orphanRemoval=true)
     */
    protected $project;
}
