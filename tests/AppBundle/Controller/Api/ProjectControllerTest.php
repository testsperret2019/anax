<?php

namespace Tests\AppBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProjectControllerTest extends WebTestCase
{
    public function testGetOne()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/project?slug=fred-compta');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('fred-compta', $client->getResponse()->getContent());
    }

    public function testGetAll()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/project');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('fred-compta', $client->getResponse()->getContent());
    }

    public function testPost()
    {
        $client = static::createClient();

        $id = uniqid();
        $crawler = $client->request('POST', '/api/project?slug=mySlug&title=myTitle'.$id.'&description=myDescription');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('myTitle'.$id, $client->getResponse()->getContent());
    }

    public function testPut()
    {
        $client = static::createClient();

        $slug = 'mySlug'.uniqid();

        // @todo : create doctrine fixture to replace this POST call
        $crawler = $client->request('POST', '/api/project?slug='.$slug.'&title=myTitle'.$slug.'&description=myDescription');

        $crawler = $client->request('PUT', '/api/project?slug='.$slug.'&title=myTitleUpdated&description=myDescriptionUpdated');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('myDescriptionUpdated', $client->getResponse()->getContent());
    }

    public function testDelete()
    {
        $client = static::createClient();

        $slug = 'mySlug'.uniqid();

        // @todo : create doctrine fixture to replace this POST call
        $crawler = $client->request('POST', '/api/project?slug='.$slug.'&title=myTitle'.$slug.'&description=myDescription');

        $crawler = $client->request('DELETE', '/api/project?slug='.$slug);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains($slug.' has been deleted', $client->getResponse()->getContent());
    }
}
