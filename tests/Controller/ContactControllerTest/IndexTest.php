<?php
declare(strict_types=1);

namespace App\Tests\Controller\ContactControllerTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IndexTest extends WebTestCase
{
    public function test_フォーム表示()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');
        $response = $client->getResponse();
        $this->assertTrue($response->isOk(), (string) $response->getContent());
        $this->assertTrue($crawler->filter('form')->count() === 1);
        $this->assertEquals('フォーム', $crawler->filter('title')->text());
    }
}
