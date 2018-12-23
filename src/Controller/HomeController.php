<?php

namespace App\Controller;


use App\Manager\UserManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @var UserManager $userManager
     */
    private $userManager;

    /**
     * HomeController constructor.
     * @param UserManager $userManager
     */
    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route(path="/home", name="homepage")
     */
    public function homePage()
    {
        $users = $this->userManager->getPrefixedUsers();

        return $this->render("home/index.html.twig", ["user" => $users]);
    }
}
