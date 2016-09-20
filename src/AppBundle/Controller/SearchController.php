<?php

namespace AppBundle\Controller;

use AppBundle\Form\DownloadFilterType;
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

    /**
     * Downloads Report.
     *
     * @Route("/downloads/report", name="search_downloads")
     */
    public function downloadsReportAction(Request $request){
        $form = $this->createForm('AppBundle\Form\DownloadsFilterType');
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $books = $em->getRepository('AppBundle:Book')->findAll();

        $book_ids=array();
        $downloads_info=array();

        $repository = $this->getDoctrine()->getRepository('AppBundle:Download');
        $query = $repository->createQueryBuilder('d');
        $query->select($query->expr()->count('d.book')." as downloads");
        $query->where("d.book is not NULL");
        $query->join('d.book', 'b');
        $query->addSelect("b.id as book_id");

        if ($form->isSubmitted() && $form->isValid()) {
            $book=$form->get("book")->getData();
            $format=$form->get("format")->getData();
            $start=$form->get("start_date")->getData();
            $end=$form->get("end_date")->getData();


            if($book){
                $query->andWhere("d.book IN (:book)")->setParameter("book",$book);
            }

            if($format){
                if($format !="all") {
                    $query->andWhere("d.format = :format")->setParameter("format", $format);
                }
            }

            if($start){
                $query->andWhere("d.date>= :start_date")->setParameter("start_date", strtotime($start));
            }

            if($end){
                $query->andWhere("d.date<= :end_date")->setParameter("end_date", strtotime($end));
            }

        }

        $query->groupBy("d.book");
        $downloads= $query->getQuery()->getArrayResult();


        foreach($downloads as $d) {
            $book_ids[] =$d["book_id"];
            $downloads_info[$d["book_id"]]=$d;
        }

        if(count($book_ids)) {
            $repository = $this->getDoctrine()->getRepository('AppBundle:Book');
            $books = $repository->findBy(array("id"=>$book_ids));
        }

        return $this->render('search/downloads-report.html.twig', array(
            'form' => $form->createView(),'books'=>$books,'downloads_info'=>$downloads_info
        ));
    }
}
