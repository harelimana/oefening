<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testAdduser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addUser');
    }

    public function testDeleteuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteUser');
    }

    public function testFinduser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/findUser');
    }

    public function testRetrieveallusers()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/retrieveAllUsers');
    }

}
