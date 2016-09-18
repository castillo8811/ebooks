<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SearchController extends Controller
{

    /**
     * Search Books.
     *
     * @Route("/search", name="search_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $search=$request->get("search");
        $books=array();

        $repository = $this->getDoctrine()->getRepository('AppBundle:Book');

        $query = $repository->createQueryBuilder('p');
        $query->where($query->expr()->like("p.title", $query->expr()->literal("%{$search}%")))
            ->orWhere($query->expr()->like("p.isbn", $query->expr()->literal("%{$search}%")))
            ->orWhere($query->expr()->like("p.autor", $query->expr()->literal("%{$search}%")))
            ;

        $books = $query->getQuery()->getResult();

        return $this->render('search/index.html.twig', array('books' => $books));
    }

    /**
     * Intructions Books.
     *
     * @Route("/instructions", name="search_instructions")
     * @Method("GET")
     */
    public function instructionsAction(Request $request){
        return $this->render('search/instructions.html.twig');

    }
}
