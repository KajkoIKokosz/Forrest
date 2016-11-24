<?php

namespace ForrestWatchBundle\Controller;

use ForrestWatchBundle\Entity\Phylum;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Phylum controller.
 *
 * @Route("phylum")
 */
class PhylumController extends Controller
{
    /**
     * Lists all phylum entities.
     *
     * @Route("/", name="phylum_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $phylums = $em->getRepository('ForrestWatchBundle:Phylum')->findAll();

        return $this->render('phylum/index.html.twig', array(
            'phylums' => $phylums,
        ));
    }

    /**
     * Creates a new phylum entity.
     *
     * @Route("/new", name="phylum_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $phylum = new Phylum();
        $form = $this->createForm('ForrestWatchBundle\Form\PhylumType', $phylum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($phylum);
            $em->flush($phylum);

            return $this->redirectToRoute('phylum_show', array('id' => $phylum->getId()));
        }

        return $this->render('phylum/new.html.twig', array(
            'phylum' => $phylum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a phylum entity.
     *
     * @Route("/{id}", name="phylum_show")
     * @Method("GET")
     */
    public function showAction(Phylum $phylum)
    {
        $deleteForm = $this->createDeleteForm($phylum);

        return $this->render('phylum/show.html.twig', array(
            'phylum' => $phylum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing phylum entity.
     *
     * @Route("/{id}/edit", name="phylum_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Phylum $phylum)
    {
        $deleteForm = $this->createDeleteForm($phylum);
        $editForm = $this->createForm('ForrestWatchBundle\Form\PhylumType', $phylum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('phylum_edit', array('id' => $phylum->getId()));
        }

        return $this->render('phylum/edit.html.twig', array(
            'phylum' => $phylum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a phylum entity.
     *
     * @Route("/{id}", name="phylum_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Phylum $phylum)
    {
        $form = $this->createDeleteForm($phylum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($phylum);
            $em->flush($phylum);
        }

        return $this->redirectToRoute('phylum_index');
    }

    /**
     * Creates a form to delete a phylum entity.
     *
     * @param Phylum $phylum The phylum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Phylum $phylum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('phylum_delete', array('id' => $phylum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
