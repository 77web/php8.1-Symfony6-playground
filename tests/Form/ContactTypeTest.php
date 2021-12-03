<?php
declare(strict_types=1);

namespace App\Tests\Form;

use App\Domain\Data\Contact;
use App\Form\ContactType;
use Symfony\Component\Form\Test\TypeTestCase;

class ContactTypeTest extends TypeTestCase
{
    public function test()
    {
        $form = $this->factory->create(ContactType::class);
        $form->submit([
            'name' => '77web',
            'age' => 'AGE_40_TO_49',
            'interests' => ['PHP', 'FRONTEND', 'INFRA'],
            'opinion' => 'I love Symfony',
        ]);
        $this->assertTrue($form->isValid());

        $data = $form->getData();
        $this->assertTrue($data instanceof Contact);
        $this->assertEquals('AGE_40_TO_49', $data->getAge());
        $this->assertEquals(['PHP', 'FRONTEND', 'INFRA'], $data->getInterests());
        $this->assertEquals('77web', $data->getName());
    }
}
