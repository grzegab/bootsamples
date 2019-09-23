<?php


namespace App\Controller;


use Faker\Generator;
use Faker\Provider\DateTime;
use Faker\Provider\Lorem;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ListController
{
    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function index(): Response
    {
        $faker = new Generator();
        $faker->addProvider(new Lorem($faker));
        $faker->addProvider(new DateTime($faker));

        return new Response($this->twig->render('list.html.twig', ['faker' => $faker]));
    }
}