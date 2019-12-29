<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class BlogController
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
    public function index(): Response
    {
        return new Response($this->twig->render('blog/index.html.twig'));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function postVideo(): Response
    {
        return new Response($this->twig->render('blog/blog-post-video.html.twig'));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function postAudio(): Response
    {
        return new Response($this->twig->render('blog/blog-post-audio.html.twig'));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function postText(): Response
    {
        return new Response($this->twig->render('blog/blog-post-text.html.twig'));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function postGallery(): Response
    {
        return new Response($this->twig->render('blog/blog-post-photo-gallery.html.twig'));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function postGrid(): Response
    {
        return new Response($this->twig->render('blog/blog-overview-grid.html.twig'));
    }
}