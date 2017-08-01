<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ImageControllerTest extends WebTestCase
{
    public function testAddimage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addImage');
    }

    public function testDeleteimage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteImage');
    }

    public function testFindimage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/findImage');
    }

    public function testRetrieveallimages()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/retrieveAllImages');
    }

}
