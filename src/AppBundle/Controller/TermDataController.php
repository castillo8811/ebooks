<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\TermData;
use AppBundle\Form\TermDataType;

/**
 * TermData controller.
 *
 * @Route("/termdata")
 */
class TermDataController extends Controller
{
    /**
     * Lists all TermData entities.
     *
     * @Route("/", name="termdata_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $termDatas = $em->getRepository('AppBundle:TermData')->findAll();

        return $this->render('termdata/index.html.twig', array(
            'termDatas' => $termDatas,
        ));
    }

    /**
     * Creates a new TermData entity.
     *
     * @Route("/new", name="termdata_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $termDatum = new TermData();
        $form = $this->createForm('AppBundle\Form\TermDataType', $termDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($termDatum);
            $em->flush();

            return $this->redirectToRoute('termdata_show', array('id' => $termDatum->getId()));
        }

        return $this->render('termdata/new.html.twig', array(
            'termDatum' => $termDatum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TermData entity.
     *
     * @Route("/{id}", name="termdata_show")
     * @Method("GET")
     */
    public function showAction(TermData $termDatum)
    {
        $deleteForm = $this->createDeleteForm($termDatum);

        return $this->render('termdata/show.html.twig', array(
            'termDatum' => $termDatum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TermData entity.
     *
     * @Route("/{id}/edit", name="termdata_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TermData $termDatum)
    {
        $deleteForm = $this->createDeleteForm($termDatum);
        $editForm = $this->createForm('AppBundle\Form\TermDataType', $termDatum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($termDatum);
            $em->flush();

            return $this->redirectToRoute('termdata_edit', array('id' => $termDatum->getId()));
        }

        return $this->render('termdata/edit.html.twig', array(
            'termDatum' => $termDatum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TermData entity.
     *
     * @Route("/{id}", name="termdata_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TermData $termDatum)
    {
        $form = $this->createDeleteForm($termDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($termDatum);
            $em->flush();
        }

        return $this->redirectToRoute('termdata_index');
    }

    /**
     * Creates a form to delete a TermData entity.
     *
     * @param TermData $termDatum The TermData entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TermData $termDatum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('termdata_delete', array('id' => $termDatum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
