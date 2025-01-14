<?php

namespace App\Controller;

use App\Service\EmailSenderService;
use App\Service\HeaderEmailDecorator;
use App\Service\SignatureEmailDecorator;
use App\Service\TimingEmailDecorator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EmailController extends AbstractController{
    #[Route('/email/send', name: 'email_send')]
    public function sendEmail(): Response
    {
        $emailSender = new EmailSenderService();
        $decoratedSender = new TimingEmailDecorator(
            new SignatureEmailDecorator(
                new HeaderEmailDecorator($emailSender)
            )
        );

        $decoratedSender->send('john.doe@example.com', 'Welcome!', 'This is the email body.');

        return new Response('Email sent successfully!');
    }
}
