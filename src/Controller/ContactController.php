<?php

namespace App\Controller;

use App\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ContactController
{
    public function __construct(
        private FormFactoryInterface  $formFactory,
        private UrlGeneratorInterface $urlGenerator,
    ) {
    }

    #[Route('/contact', name: 'contact')]
    #[Template]
    public function index(Request $request): array|RedirectResponse
    {
        $form = $this->formFactory->createNamed('', ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // TODO send mail to us :)
            return new RedirectResponse($this->urlGenerator->generate('contact_thanks'));
        }

        return [
            'form' => $form->createView(),
        ];
    }

    #[Route('/contact/thanks', name: 'contact_thanks')]
    #[Template]
    public function thanks(): array
    {
        return [];
    }
}
