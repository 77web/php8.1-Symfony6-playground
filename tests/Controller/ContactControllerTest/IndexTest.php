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

    public function test_フォーム送信()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');
        $response = $client->getResponse();
        $this->assertTrue($response->isOk(), (string) $response->getContent());

        $form = $crawler->selectButton('フォーム送信')->form();
        $form['name'] = '77web';
        $form['age'] = 3;
        $form['interests']->select('php');
        $form['opinion'] = 'enum is great';
        $client->submit($form);

        $sendResponse = $client->getResponse();
        $this->assertTrue($sendResponse->isRedirect('/contact/thanks'), (string) $sendResponse->getStatusCode());
    }
}
