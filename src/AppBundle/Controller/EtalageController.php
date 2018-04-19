<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Etalage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Etalage controller.
 *
 * @Route("etalage")
 */
class EtalageController extends Controller
{
    /**
     * Lists all etalage entities.
     *
     * @Route("/", name="etalage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etalages = $em->getRepository('AppBundle:Etalage')->findAll();

        return $this->render('etalage/index.html.twig', array(
            'etalages' => $etalages,
            'title' => 'Index',
            'imgBackground' => 'img/background-bio.jpg',
            'subHeader' => 'Liste des étals',
            'headerH1' => 'Etalages'
        ));
    }

    /**
     * Creates a new etalage entity.
     *
     * @Route("/new", name="etalage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $etalage = new Etalage();
        $form = $this->createForm('AppBundle\Form\EtalageType', $etalage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etalage);
            $em->flush();

            return $this->redirectToRoute('etalage_show', array('id' => $etalage->getId()));
        }

        return $this->render('etalage/new.html.twig', array(
            'etalage' => $etalage,
            'form' => $form->createView(),
            'title' => 'Index',
            'imgBackground' => 'img/background-bio.jpg',
            'subHeader' => 'Proposez votre étalage',
            'headerH1' => 'Etalages'
        ));
    }

    /**
     * Finds and displays a etalage entity.
     *
     * @Route("/{id}", name="etalage_show")
     * @Method("GET")
     */
    public function showAction(Etalage $etalage)
    {
        $deleteForm = $this->createDeleteForm($etalage);

        return $this->render('etalage/show.html.twig', array(
            'etalage' => $etalage,
            'delete_form' => $deleteForm->createView(),
            'title' => 'Index',
            'imgBackground' => 'img/background-bio.jpg',
            'subHeader' => 'Description',
            'headerH1' => 'Etalages'
        ));
    }

    /**
     * Displays a form to edit an existing etalage entity.
     *
     * @Route("/{id}/edit", name="etalage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Etalage $etalage)
    {
        $deleteForm = $this->createDeleteForm($etalage);
        $editForm = $this->createForm('AppBundle\Form\EtalageType', $etalage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etalage_edit', array('id' => $etalage->getId()));
        }

        return $this->render('etalage/edit.html.twig', array(
            'etalage' => $etalage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'title' => 'Index',
            'imgBackground' => 'img/background-bio.jpg',
            'subHeader' => 'Modifier l\'étal',
            'headerH1' => 'Etalages'
        ));
    }

    /**
     * Deletes a etalage entity.
     *
     * @Route("/{id}", name="etalage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Etalage $etalage)
    {
        $form = $this->createDeleteForm($etalage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($etalage);
            $em->flush();
        }

        return $this->redirectToRoute('etalage_index');
    }

    /**
     * Creates a form to delete a etalage entity.
     *
     * @param Etalage $etalage The etalage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Etalage $etalage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etalage_delete', array('id' => $etalage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
