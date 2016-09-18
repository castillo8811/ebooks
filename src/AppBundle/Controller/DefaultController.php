<?php
/**
 * Created by PhpStorm.
 * User: magnolia
 * Date: 8/18/16
 * Time: 10:37 AM
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends  Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function  indexAction(Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

}