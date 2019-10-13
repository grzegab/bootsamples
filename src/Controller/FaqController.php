<?php


namespace App\Controller;


use Faker\Generator;
use Faker\Provider\Address;
use Faker\Provider\Company;
use Faker\Provider\DateTime;
use Faker\Provider\Image;
use Faker\Provider\Internet;
use Faker\Provider\Lorem;
use Faker\Provider\Person;
use Faker\Provider\PhoneNumber;
use Faker\Provider\pl_PL\Text;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class FaqController
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
     * Generates fake data.
     *
     * @return Generator
     */
    private function loadFaker(): Generator
    {
        // Add fake data to the page
        $faker = new Generator();
        $faker->addProvider(new Image($faker));
        $faker->addProvider(new Lorem($faker));
        $faker->addProvider(new Text($faker));

        return $faker;
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index(): Response
    {
        return new Response($this->twig->render('faq/index.html.twig', ['faker' => $this->loadFaker()]));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function article(): Response
    {
        return new Response($this->twig->render('faq/article.html.twig', ['faker' => $this->loadFaker()]));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function category(): Response
    {
        return new Response($this->twig->render('faq/category.html.twig', ['faker' => $this->loadFaker()]));
    }
}