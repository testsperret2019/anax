<?php

namespace Tests\Services;

use Anaxago\CoreBundle\Services\ProjectService;
use Anaxago\CoreBundle\Entity\Project;

class ProjectServiceTest extends \PHPUnit\Framework\TestCase
{
    public function testInitSlug()
    {
        $projectService = new ProjectService();
        $project = new Project();
        $project->setDescription('abcdef');

        $projectService->setProject($project);
        $project = $projectService->initSlug();

        $this->assertEquals('abcde', substr($project->getSlug(), 0, 5));
    }

    public function testAccesors()
    {
        $projectService = new ProjectService();
        $project = new Project();
        $project->setDescription('accessors');

        $projectService->setProject($project);
        $project = $projectService->getProject();

        $this->assertEquals('accessors', $project->getDescription());
    }
}
