<?php

namespace Anaxago\CoreBundle\Services;

use Anaxago\CoreBundle\Entity\Project;


/**
 * Responsability : Logic of the Project entity
 *
 */
class ProjectService
{
    private $project;

    public function setProject(Project $project)
    {
        $this->project = $project;
    }

    public function getProject() : Project
    {
        return $this->project;
    }

    public function initSlug() : Project
    {
        if(empty($this->project)) {
            // throw exeception
        }

        $slug = substr($this->project->getDescription(), 0, 5).'-'.uniqid();
        $this->project->setSlug($slug);

        return $this->project;
    }
}
