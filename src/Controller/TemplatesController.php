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

    public function contact(): Response
    {
        return new Response($this->twig->render('templates/contact.html.twig'));
    }

    public function footer(): Response
    {
        return new Response($this->twig->render('templates/footer.html.twig'));
    }

    public function sitemap(): Response
    {
        return new Response($this->twig->render('templates/sitemap.html.twig'));
    }

    public function shortcuts(): Response
    {
        return new Response($this->twig->render('templates/shortcuts.html.twig'));
    }

    public function faq(): Response
    {
        return new Response($this->twig->render('templates/faq.html.twig'));
    }

    public function thanks(): Response
    {
        return new Response($this->twig->render('templates/thanks.html.twig'));
    }

    public function employees(): Response
    {
        return new Response($this->twig->render('templates/employees.html.twig'));
    }

    public function pricing(): Response
    {
        return new Response($this->twig->render('templates/pricing.html.twig'));
    }

    public function createAccount(): Response
    {
        return new Response($this->twig->render('templates/create-account.html.twig'));
    }

}