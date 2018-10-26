<?php

namespace iFlair\SalaryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SalaryBundle:Default:index.html.twig');
    }
}
