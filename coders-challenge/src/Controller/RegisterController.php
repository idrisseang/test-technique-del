<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegisterController extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

     #[Route("/register", name: "register", methods: ["POST"])]
     
    public function register(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $name = $data['name'] ?? '';
        $email = $data['email'] ?? '';
        $response = $this->client->request('POST', 'http://test-technique.pexa4457.odns.fr/register', [
            'json' => ['name' => $name, 'email' => $email],
            'headers' => [
                'Authorization' => 'SuperSecretToken1234',
            ],
        ]);
        $statusCode = $response->getStatusCode();
        $content = $response->getContent();

        return new Response($content, $statusCode, ['content-type' => 'application/json']);
    }
}
