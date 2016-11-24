<?php

namespace ForrestWatchBundle\Controller;

use ForrestWatchBundle\Entity\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Environment controller.
 *
 * @Route("environment")
 */
class EnvironmentController extends Controller
{
    /**
     * Lists all environment entities.
     *
     * @Route("/", name="environment_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $environments = $em->getRepository('ForrestWatchBundle:Environment')->findAll();

        return $this->render('environment/index.html.twig', array(
            'environments' => $environments,
        ));
    }

    /**
     * Creates a new environment entity.
     *
     * @Route("/new", name="environment_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $environment = new Environment();
        $form = $this->createForm('ForrestWatchBundle\Form\EnvironmentType', $environment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($environment);
            $em->flush($environment);

            return $this->redirectToRoute('environment_show', array('id' => $environment->getId()));
        }

        return $this->render('environment/new.html.twig', array(
            'environment' => $environment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a environment entity.
     *
     * @Route("/{id}", name="environment_show")
     * @Method("GET")
     */
    public function showAction(Environment $environment)
    {
        $deleteForm = $this->createDeleteForm($environment);

        return $this->render('environment/show.html.twig', array(
            'environment' => $environment,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing environment entity.
     *
     * @Route("/{id}/edit", name="environment_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Environment $environment)
    {
        $deleteForm = $this->createDeleteForm($environment);
        $editForm = $this->createForm('ForrestWatchBundle\Form\EnvironmentType', $environment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('environment_edit', array('id' => $environment->getId()));
        }

        return $this->render('environment/edit.html.twig', array(
            'environment' => $environment,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a environment entity.
     *
     * @Route("/{id}", name="environment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Environment $environment)
    {
        $form = $this->createDeleteForm($environment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($environment);
            $em->flush($environment);
        }

        return $this->redirectToRoute('environment_index');
    }

    /**
     * Creates a form to delete a environment entity.
     *
     * @param Environment $environment The environment entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Environment $environment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('environment_delete', array('id' => $environment->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
