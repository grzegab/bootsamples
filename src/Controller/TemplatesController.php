<?php


namespace App\Controller;


use Faker\Generator;
use Faker\Provider\{DateTime, en_US\Person, Image, Lorem};
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class TemplatesController
{
    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function photoGallery(): Response
    {
        $faker = new Generator();
        $faker->addProvider(new Lorem($faker));
        $faker->addProvider(new Image($faker));
        $faker->addProvider(new DateTime($faker));
        $faker->addProvider(new Person($faker));

        return new Response($this->twig->render('templates/photo-gallery.html.twig', ['faker' => $faker]));
    }

}