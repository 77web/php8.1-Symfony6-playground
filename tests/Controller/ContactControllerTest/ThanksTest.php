<?php
declare(strict_types=1);

namespace App\Tests\Controller\ContactControllerTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ThanksTest extends WebTestCase
{
    public function test_完了画面表示()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact/thanks');
        $response = $client->getResponse();
        $this->assertTrue($response->isOk(), (string) $response->getContent());
        $this->assertTrue($crawler->filter('form')->count() === 0);
        $this->assertEquals('送信完了', $crawler->filter('title')->text());
    }
}
