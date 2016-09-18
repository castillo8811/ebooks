<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Vocabulary;
use AppBundle\Form\VocabularyType;

/**
 * Vocabulary controller.
 *
 * @Route("/vocabulary")
 */
class VocabularyController extends Controller
{
    /**
     * Lists all Vocabulary entities.
     *
     * @Route("/", name="vocabulary_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vocabularies = $em->getRepository('AppBundle:Vocabulary')->findAll();

        return $this->render('vocabulary/index.html.twig', array(
            'vocabularies' => $vocabularies,
        ));
    }

    /**
     * Creates a new Vocabulary entity.
     *
     * @Route("/new", name="vocabulary_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vocabulary = new Vocabulary();
        $form = $this->createForm('AppBundle\Form\VocabularyType', $vocabulary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vocabulary);
            $em->flush();

            return $this->redirectToRoute('vocabulary_show', array('id' => $vocabulary->getId()));
        }

        return $this->render('vocabulary/new.html.twig', array(
            'vocabulary' => $vocabulary,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Vocabulary entity.
     *
     * @Route("/{id}", name="vocabulary_show")
     * @Method("GET")
     */
    public function showAction(Vocabulary $vocabulary)
    {
        $deleteForm = $this->createDeleteForm($vocabulary);

        return $this->render('vocabulary/show.html.twig', array(
            'vocabulary' => $vocabulary,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Vocabulary entity.
     *
     * @Route("/{id}/edit", name="vocabulary_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vocabulary $vocabulary)
    {
        $deleteForm = $this->createDeleteForm($vocabulary);
        $editForm = $this->createForm('AppBundle\Form\VocabularyType', $vocabulary);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vocabulary);
            $em->flush();

            return $this->redirectToRoute('vocabulary_edit', array('id' => $vocabulary->getId()));
        }

        return $this->render('vocabulary/edit.html.twig', array(
            'vocabulary' => $vocabulary,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Vocabulary entity.
     *
     * @Route("/{id}", name="vocabulary_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vocabulary $vocabulary)
    {
        $form = $this->createDeleteForm($vocabulary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vocabulary);
            $em->flush();
        }

        return $this->redirectToRoute('vocabulary_index');
    }

    /**
     * Creates a form to delete a Vocabulary entity.
     *
     * @param Vocabulary $vocabulary The Vocabulary entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vocabulary $vocabulary)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vocabulary_delete', array('id' => $vocabulary->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
