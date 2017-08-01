<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategorieControllerTest extends WebTestCase
{
    public function testAddcategorie()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addCategorie');
    }

    public function testDeletecategorie()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteCategorie');
    }

    public function testFindcategorie()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/findCategorie');
    }

    public function testRetrieveallcat()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/retrieveAllCat');
    }

}
