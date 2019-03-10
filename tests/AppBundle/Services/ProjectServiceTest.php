<?php

namespace Tests\Services;

use Anaxago\CoreBundle\Services\ProjectService;
use Anaxago\CoreBundle\Entity\Project;
use Symfony\Component\Serializer\SerializerInterface;

class ProjectServiceTest extends \PHPUnit\Framework\TestCase
{
    private $projectService;

    protected function setUp()
    {
        $serialiser = \Mockery::mock('\Symfony\Component\Serializer\Serializer');
        $this->projectService = new ProjectService($serialiser);
    }

    public function testInitSlug()
    {

        $project = new Project();
        $project->setDescription('abcdef');

        $this->projectService->setProject($project);
        $project = $this->projectService->initSlug();

        $this->assertEquals('abcde', substr($project->getSlug(), 0, 5));
    }

    public function testAccesors()
    {
        $project = new Project();
        $project->setDescription('accessors');

        $this->projectService->setProject($project);
        $project = $this->projectService->getProject();

        $this->assertEquals('accessors', $project->getDescription());
    }

    protected function tearDown()
    {
        \Mockery::close();
    }
}
