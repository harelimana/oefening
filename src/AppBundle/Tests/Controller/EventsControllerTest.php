<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EventsControllerTest extends WebTestCase
{
    public function testAddevent()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addEvent');
    }

    public function testDeleteevent()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteEvent');
    }

    public function testFindevent()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/findEvent');
    }

    public function testRetrieveallevents()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/retrieveAllEvents');
    }

}
