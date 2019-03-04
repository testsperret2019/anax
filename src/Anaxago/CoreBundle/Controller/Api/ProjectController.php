<?php

namespace Anaxago\CoreBundle\Controller\Api;

use Anaxago\CoreBundle\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\View;


/**
 * Class ProjectController
 *
 * @package Anaxago\CoreBundle\Controller
 */
class ProjectController extends AbstractFOSRestController
{
    /**
     * @return \FOS\RestBundle\View\View
     * @Rest\Get("/project", name = "api_project_get", options={ "method_prefix" = false })
     * @Rest\View
     */
    public function getProject(EntityManagerInterface $entityManager, Request $request)
    {
        $projects = $entityManager->getRepository(Project::class)->findAll();

        return $projects;
    }

    /**
     * @return \FOS\RestBundle\View\View
     * @Rest\Put("/project", name = "api_project_put", options={ "method_prefix" = false })
     * @Rest\View
     */
    public function putProject(EntityManagerInterface $entityManager, Request $request)
    {
        $project = $entityManager->getRepository(Project::class)->findOneBySlug($request->get('slug'));

        if ($project) {
            $project->setSlug($request->get('slug'));  // move to service
            $project->setTitle($request->get('title'));
            $project->setDescription($request->get('description'));

            $entityManager->persist($project);
            $entityManager->flush();
        }

        return $project;
    }

    /**
     * @return \FOS\RestBundle\View\View
     * @Rest\Delete("/project", name = "api_project_delete", options={ "method_prefix" = false })
     * @Rest\View
     */
    public function deleteProject(EntityManagerInterface $entityManager, Request $request)
    {
        $project = $entityManager->getRepository(Project::class)->findOneBySlug($request->get('slug'));

        if ($project) {
            $entityManager->remove($project);
            $entityManager->flush();
        }

        return ['message' => $project->getSlug().' has been deleted'];
    }

    /**
     * @return \FOS\RestBundle\View\View
     * @Rest\Post("/project", name = "api_project_post", options={ "method_prefix" = false })
     * @Rest\View
     */
    public function postProject(EntityManagerInterface $entityManager, Request $request)
    {
        $project = new Project();
        $project->setSlug($request->get('slug'));
        $project->setTitle($request->get('title'));
        $project->setDescription($request->get('description'));

        $entityManager->persist($project);
        $entityManager->flush();

        return ['message' => $project->getTitle().' has been created'];
    }
}
