<?php

namespace Anaxago\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups as SerializerGroups;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use Anaxago\CoreBundle\Enum\Project\Status;
use Anaxago\CoreBundle\Entity\Traits\IdAutoTrait;
use Anaxago\CoreBundle\Entity\Traits\AmountTrait;


/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="Anaxago\CoreBundle\Repository\ProjectRepository")
 * @ExclusionPolicy("all")
 */
class Project
{
    use IdAutoTrait, AmountTrait;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     * @expose
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     * @expose
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="amount_ceil", type="integer", nullable=true)
     * @expose
     */
    private $amountCeil;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", nullable=true)
     * @expose
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     * @expose
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     * @expose
     */
    private $description;

    /**
     *
     * @param string $slug
     *
     * @return Project
     */
    public function setSlug(string $slug) : Project
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     *
     * @return string
     */
    public function getSlug() : string
    {
        return $this->slug;
    }

    /**
     *
     * @param string $status
     *
     * @return Project
     */
    public function setStatus(string $status) : Project
    {
        $this->status = $status;

        return $this;
    }

    /**
     *
     * @return string
     */
    public function getStatus() : string
    {
        return $this->status;
    }

    /**
     *
     * @return bool
     */
    public function isFunded() : bool
    {
        $isFunded = false;
        if($this->status === Status::FUNDED) {
            $isFunded = true;
        }
        return $isFunded;
    }

    /**
     *
     * @param integer $status
     *
     * @return Project
     */
    public function setAmountCeil(int $amountCeil) : Project
    {
        $this->amountCeil = $amountCeil;

        return $this;
    }

    /**
     *
     * @return integer
     */
    public function getAmountCeil() : int
    {
        return $this->amountCeil;
    }

    /**
     *
     * @param string $title
     *
     * @return Project
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     *
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     *
     * @param string $description
     *
     * @return Project
     */
    public function setDescription(string $description) : Project
    {
        $this->description = $description;

        return $this;
    }

    /**
     *
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }
}

