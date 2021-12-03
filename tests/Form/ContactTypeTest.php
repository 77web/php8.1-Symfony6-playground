<?php
declare(strict_types=1);

namespace App\Tests\Form;

use App\Domain\Data\Contact;
use App\Domain\Enum\Age;
use App\Domain\Enum\Interest;
use App\Form\ContactType;
use Symfony\Component\Form\Test\TypeTestCase;

class ContactTypeTest extends TypeTestCase
{
    public function test()
    {
        $form = $this->factory->create(ContactType::class);
        $form->submit([
            'name' => '77web',
            'age' => 3, // Age::AGE_40_TO_49の4番目のcase
            'interests' => ['php', 'angular', 'aws'],
            'opinion' => 'I love Symfony',
        ]);
        $this->assertTrue($form->isValid());

        $data = $form->getData();
        $this->assertTrue($data instanceof Contact);
        $this->assertEquals(Age::AGE_40_TO_49, $data->getAge());
        $this->assertEquals([Interest::PHP, Interest::FRONTEND, Interest::INFRA], $data->getInterests());
        $this->assertEquals('77web', $data->getName());
    }
}
