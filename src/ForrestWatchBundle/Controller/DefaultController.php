<?php

namespace ForrestWatchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ForrestWatchBundle\Entity\Questions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="base_panel")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('ForrestWatchBundle:Questions');
        $questions = $repository->findAll();
        
        $repository = $this->getDoctrine()->getRepository('ForrestWatchBundle:Region');
        $regions = $repository->findAll();
        $regionArray = array();
        foreach( $regions as $reg ) {
            $regionArray[] = [$reg->getName() => $reg]; 
        }
        
        $repository = $this->getDoctrine()->getRepository('ForrestWatchBundle:Kingdom');
        $kingdom = $repository->findAll();
        
        $newQuestion = new Questions();
        $questionForm = $this->createFormBuilder();
        
        $form = $this->createFormBuilder($newQuestion)
                ->add('topic', "text")
                ->add('questionContent', "textarea")
                ->add('Region', ChoiceType::class, array(
                    'choices' => $regionArray,
                    'choices_as_values' => true,
                ))
                ->add('zapytaj', "submit")
                ->getForm();
        
        $form->handleRequest($request);
        
       if( $form->isSubmitted() & $form->isValid() ){
           $questionForm = $form->getData();
           
           $em = $this->getDoctrine()->getManager();
           $em->persist($newQuestion);
           $em->flush();
       } 
    
        
        return $this->render('ForrestWatchBundle:Default:index.html.twig', array(
            'form' => $form->createView()
//            'questions' => $questions,
//            'regions' => $regions,
//            'kingdom' => $kingdom
        ));
        
    }
    
}
