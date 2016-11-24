<?php

namespace ForrestWatchBundle\Controller;

use ForrestWatchBundle\Entity\Kingdom;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Kingdom controller.
 *
 * @Route("kingdom")
 */
class KingdomController extends Controller
{
    /**
     * Lists all kingdom entities.
     *
     * @Route("/", name="kingdom_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $kingdoms = $em->getRepository('ForrestWatchBundle:Kingdom')->findAll();

        return $this->render('kingdom/index.html.twig', array(
            'kingdoms' => $kingdoms,
        ));
    }

    /**
     * Creates a new kingdom entity.
     *
     * @Route("/new", name="kingdom_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $kingdom = new Kingdom();
        $form = $this->createForm('ForrestWatchBundle\Form\KingdomType', $kingdom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($kingdom);
            $em->flush($kingdom);

            return $this->redirectToRoute('kingdom_show', array('id' => $kingdom->getId()));
        }

        return $this->render('kingdom/new.html.twig', array(
            'kingdom' => $kingdom,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a kingdom entity.
     *
     * @Route("/{id}", name="kingdom_show")
     * @Method("GET")
     */
    public function showAction(Kingdom $kingdom)
    {
        $deleteForm = $this->createDeleteForm($kingdom);

        return $this->render('kingdom/show.html.twig', array(
            'kingdom' => $kingdom,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing kingdom entity.
     *
     * @Route("/{id}/edit", name="kingdom_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Kingdom $kingdom)
    {
        $deleteForm = $this->createDeleteForm($kingdom);
        $editForm = $this->createForm('ForrestWatchBundle\Form\KingdomType', $kingdom);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kingdom_edit', array('id' => $kingdom->getId()));
        }

        return $this->render('kingdom/edit.html.twig', array(
            'kingdom' => $kingdom,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a kingdom entity.
     *
     * @Route("/{id}", name="kingdom_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Kingdom $kingdom)
    {
        $form = $this->createDeleteForm($kingdom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($kingdom);
            $em->flush($kingdom);
        }

        return $this->redirectToRoute('kingdom_index');
    }

    /**
     * Creates a form to delete a kingdom entity.
     *
     * @param Kingdom $kingdom The kingdom entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Kingdom $kingdom)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('kingdom_delete', array('id' => $kingdom->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
