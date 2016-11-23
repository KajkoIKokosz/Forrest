<?php

namespace ForrestBundle\Controller;

use ForrestBundle\Entity\KingDom;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Kingdom controller.
 *
 * @Route("kingdom")
 */
class KingDomController extends Controller
{
    /**
     * Lists all kingDom entities.
     *
     * @Route("/", name="kingdom_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $kingDoms = $em->getRepository('ForrestBundle:KingDom')->findAll();

        return $this->render('kingdom/index.html.twig', array(
            'kingDoms' => $kingDoms,
        ));
    }

    /**
     * Creates a new kingDom entity.
     *
     * @Route("/new", name="kingdom_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $kingDom = new Kingdom();
        $form = $this->createForm('ForrestBundle\Form\KingDomType', $kingDom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($kingDom);
            $em->flush($kingDom);

            return $this->redirectToRoute('kingdom_show', array('id' => $kingDom->getId()));
        }

        return $this->render('kingdom/new.html.twig', array(
            'kingDom' => $kingDom,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a kingDom entity.
     *
     * @Route("/{id}", name="kingdom_show")
     * @Method("GET")
     */
    public function showAction(KingDom $kingDom)
    {
        $deleteForm = $this->createDeleteForm($kingDom);

        return $this->render('kingdom/show.html.twig', array(
            'kingDom' => $kingDom,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing kingDom entity.
     *
     * @Route("/{id}/edit", name="kingdom_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, KingDom $kingDom)
    {
        $deleteForm = $this->createDeleteForm($kingDom);
        $editForm = $this->createForm('ForrestBundle\Form\KingDomType', $kingDom);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kingdom_edit', array('id' => $kingDom->getId()));
        }

        return $this->render('kingdom/edit.html.twig', array(
            'kingDom' => $kingDom,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a kingDom entity.
     *
     * @Route("/{id}", name="kingdom_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, KingDom $kingDom)
    {
        $form = $this->createDeleteForm($kingDom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($kingDom);
            $em->flush($kingDom);
        }

        return $this->redirectToRoute('kingdom_index');
    }

    /**
     * Creates a form to delete a kingDom entity.
     *
     * @param KingDom $kingDom The kingDom entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(KingDom $kingDom)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('kingdom_delete', array('id' => $kingDom->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
