<?php


namespace App\Controller;


use Faker\Generator;
use Faker\Provider\{Address, Company, DateTime, Image, Internet, Lorem, Person, PhoneNumber, pl_PL\Text};
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\{LoaderError, RuntimeError, SyntaxError};

class BusinessController
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * BusinessController constructor.
     * @param Environment $twig
     */
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
        $faker->addProvider(new Person($faker));
        $faker->addProvider(new Text($faker));
        $faker->addProvider(new Company($faker));
        $faker->addProvider(new PhoneNumber($faker));
        $faker->addProvider(new Address($faker));
        $faker->addProvider(new Internet($faker));
        $faker->addProvider(new DateTime($faker));

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
        return new Response($this->twig->render('business/index.html.twig',
            ['faker' => $this->loadFaker(), 'active' => 'index']));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function about(): Response
    {
        return new Response($this->twig->render('business/about.html.twig',
            ['faker' => $this->loadFaker(), 'active' => 'about']));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function contact(): Response
    {
        return new Response($this->twig->render('business/contact.html.twig',
            ['faker' => $this->loadFaker(), 'active' => 'contact']));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function services(): Response
    {
        return new Response($this->twig->render('business/services.html.twig',
            ['faker' => $this->loadFaker(), 'active' => 'services']));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function team(): Response
    {
        return new Response($this->twig->render('business/team.html.twig',
            ['faker' => $this->loadFaker(), 'active' => 'team']));
    }
}