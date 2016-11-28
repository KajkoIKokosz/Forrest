<?php

namespace ForrestWatchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="base_panel")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('ForrestWatchBundle:Questions');
        $questions = $repository->findAll();
        
        $repository = $this->getDoctrine()->getRepository('ForrestWatchBundle:Region');
        $regions = $repository->findAll();
        
        $repository = $this->getDoctrine()->getRepository('ForrestWatchBundle:Kingdom');
        $kingdom = $repository->findAll();
        
        return $this->render('ForrestWatchBundle:Default:index.html.twig', array(
            'questions' => $questions,
            'regions' => $regions,
            'kingdom' => $kingdom
        ));
        
    }
}
