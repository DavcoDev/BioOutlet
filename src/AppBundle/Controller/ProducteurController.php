<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Producteur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Producteur controller.
 *
 * @Route("producteur")
 */
class ProducteurController extends Controller
{
    /**
     * Lists all producteur entities.
     *
     * @Route("/", name="producteur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $producteurs = $em->getRepository('AppBundle:Producteur')->findAll();

        return $this->render('producteur/index.html.twig', array(
            'producteurs' => $producteurs,
            'title' => 'Index',
            'imgBackground' => 'img/background-bio.jpg',
            'subHeader' => 'index',
            'headerH1' => 'Producteur',

        ));
    }

    /**
     * Creates a new producteur entity.
     *
     * @Route("/new", name="producteur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $producteur = new Producteur();
        $form = $this->createForm('AppBundle\Form\ProducteurType', $producteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producteur);
            $em->flush();

            return $this->redirectToRoute('producteur_show', array('id' => $producteur->getId()));
        }

        return $this->render('producteur/new.html.twig', array(
            'producteur' => $producteur,
            'form' => $form->createView(),
            'title' => 'Index',
            'imgBackground' => 'img/background-bio.jpg',
            'subHeader' => 'new',
            'headerH1' => 'Producteur',
        ));
    }

    /**
     * Finds and displays a producteur entity.
     *
     * @Route("/{id}", name="producteur_show")
     * @Method("GET")
     */
    public function showAction(Producteur $producteur)
    {
        $deleteForm = $this->createDeleteForm($producteur);

        return $this->render('producteur/show.html.twig', array(
            'producteur' => $producteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing producteur entity.
     *
     * @Route("/{id}/edit", name="producteur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Producteur $producteur)
    {
        $deleteForm = $this->createDeleteForm($producteur);
        $editForm = $this->createForm('AppBundle\Form\ProducteurType', $producteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('producteur_edit', array('id' => $producteur->getId()));
        }

        return $this->render('producteur/edit.html.twig', array(
            'producteur' => $producteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a producteur entity.
     *
     * @Route("/{id}", name="producteur_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Producteur $producteur)
    {
        $form = $this->createDeleteForm($producteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($producteur);
            $em->flush();
        }

        return $this->redirectToRoute('producteur_index');
    }

    /**
     * Creates a form to delete a producteur entity.
     *
     * @param Producteur $producteur The producteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Producteur $producteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('producteur_delete', array('id' => $producteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
