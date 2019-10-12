<?php


namespace App\Controller;


use Faker\Generator;
use Faker\Provider\{Address, DateTime, en_US\Person, Image, Internet, Lorem, PhoneNumber};
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

    /**
     * TemplatesController constructor.
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
    public function photoGallery(): Response
    {
        $faker = new Generator();
        $faker->addProvider(new Lorem($faker));
        $faker->addProvider(new Image($faker));
        $faker->addProvider(new DateTime($faker));
        $faker->addProvider(new Person($faker));

        return new Response($this->twig->render('templates/photo-gallery.html.twig', ['faker' => $faker]));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function videoGallery(): Response
    {
        $faker = new Generator();
        $faker->addProvider(new Lorem($faker));

        return new Response($this->twig->render('templates/video-gallery.html.twig', ['faker' => $faker]));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function mixedGallery(): Response
    {
        $faker = new Generator();
        $faker->addProvider(new Lorem($faker));
        $faker->addProvider(new Image($faker));
        $faker->addProvider(new DateTime($faker));
        $faker->addProvider(new Person($faker));

        return new Response($this->twig->render('templates/mixed-gallery.html.twig', ['faker' => $faker]));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function login(): Response
    {
        return new Response($this->twig->render('templates/page-login.html.twig'));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function contact(): Response
    {
        $faker = new Generator();
        $faker->addProvider(new Person($faker));
        $faker->addProvider(new Address($faker));
        $faker->addProvider(new PhoneNumber($faker));
        $faker->addProvider(new Internet($faker));
        $faker->addProvider(new DateTime($faker));

        return new Response($this->twig->render('templates/contact.html.twig', ['faker' => $faker]));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function footer(): Response
    {
        return new Response($this->twig->render('templates/footer.html.twig'));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function sitemap(): Response
    {
        return new Response($this->twig->render('templates/sitemap.html.twig'));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function shortcuts(): Response
    {
        return new Response($this->twig->render('templates/shortcuts.html.twig'));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function faq(): Response
    {
        $faker = new Generator();
        $faker->addProvider(new Lorem($faker));

        return new Response($this->twig->render('templates/faq.html.twig', ['faker' => $faker]));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function thanks(): Response
    {
        return new Response($this->twig->render('templates/thanks.html.twig'));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function employees(): Response
    {
        $faker = new Generator();
        $faker->addProvider(new Person($faker));
        $faker->addProvider(new Image($faker));

        return new Response($this->twig->render('templates/employees.html.twig', ['faker' => $faker]));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function pricing(): Response
    {
        return new Response($this->twig->render('templates/pricing.html.twig'));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function createAccount(): Response
    {
        return new Response($this->twig->render('templates/create-account.html.twig'));
    }

}