<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestGitHubController extends Controller
{
    /**
     * @Route("/test/git/hub", name="test_git_hub")
     */
    public function index()
    {
        return $this->render('test_git_hub/index.html.twig', [
            'controller_name' => 'TestGitHubController',
        ]);
    }
}
