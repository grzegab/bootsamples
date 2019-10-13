<?php


namespace App\Controller;


use Faker\Generator;
use Faker\Provider\Address;
use Faker\Provider\DateTime;
use Faker\Provider\en_US\Person;
use Faker\Provider\Image;
use Faker\Provider\Internet;
use Faker\Provider\Lorem;
use Faker\Provider\PhoneNumber;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class LandingController
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * LandingController constructor.
     * @param Environment $twig
     */
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
    public function index(): Response
    {
        // Add fake data to the page
        $faker = new Generator();
        $faker->addProvider(new Person($faker));
        $faker->addProvider(new Image($faker));
        $faker->addProvider(new Lorem($faker));
        $faker->addProvider(new Address($faker));
        $faker->addProvider(new PhoneNumber($faker));
        $faker->addProvider(new Internet($faker));
        $faker->addProvider(new DateTime($faker));

        return new Response($this->twig->render('landing_page/index.html.twig', ['faker' => $faker]));
    }
}