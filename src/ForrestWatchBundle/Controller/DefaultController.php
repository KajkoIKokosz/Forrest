<?php

namespace ForrestWatchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ForrestWatchBundle\Entity\Questions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Response;
use ForrestWatchBundle\Entity\Phylum;

class DefaultController extends Controller
{
    /**
     * @Route("/{kingId}", defaults={"kingId": ""}, name="base_panel")
     * 
     * 
     */
    public function indexAction(Request $request, $parametr, $kingId)
    {
        $repository = $this->getDoctrine()->getRepository('ForrestWatchBundle:Questions');
        $questions = $repository->findAll();
        
        $repository = $this->getDoctrine()->getRepository('ForrestWatchBundle:Phylum');
        $phylumsArray = array();
        
        if ( !is_null($kingId) ) {
          
          $em = $this->getDoctrine()->getEntityManager();
          $conn = $em->getConnection();
          
          $query = "SELECT * FROM phylum";
          $stmt = $conn->prepare($query);
          $stmt->execute();
          $phylums = $stmt->fetchAll();
        }
        
        foreach( $phylums as $phylum ) {
            $phylumsArray[$phylum->getName()] = $phylum;  
        }
        
        $repository = $this->getDoctrine()->getRepository('ForrestWatchBundle:Region');
        $regions = $repository->findAll();
        $regionsArray = array();
        foreach( $regions as $region ) {
            $regionsArray[$region->getName()] = $region;  
        }
        //dump($phylumsArray); die();
        
        $repository = $this->getDoctrine()->getRepository('ForrestWatchBundle:Kingdom');
        $kingdom = $repository->findAll();
        
        $newQuestion = new Questions();
//        $questionForm = $this->createForm(new EntityType(), $regions);
        
        $form = $this->createFormBuilder($newQuestion)
                ->add('topic', TextType::class)
                ->add('questionContent', "textarea")
                ->add('Kingdom', EntityType::class, array(
                    'class' => 'ForrestWatchBundle:Kingdom',
                    'choice_label' => 'name',
                    'expanded' => false,
                    'multiple' => false,
                    'attr' => array('class' => 'kingdom'),
                    // elementy biol_system poza kingdom pojawią się
                    // dopiero po wybraniu elementu kingdom
                ))
                ->add('phylum', ChoiceType::class, array(
                    'required' => false,
                    'choices' => $phylumsArray,
                    'choices_as_values' => true,
                    'expanded' => true,
                    'multiple' => false,
                    'attr' => array('class' => 'phylum biol_system')
                    ))
                ->add('region', EntityType::class, array(
                    'required' => false,
                    'class' => 'ForrestWatchBundle:Region',
                    'choice_label' => 'name',
                    'expanded' => false,
                    'multiple' => true,
                    ))
                ->add('environment', EntityType::class, array(
                    'required' => false,
                    'class' => 'ForrestWatchBundle:Environment',
                    'choice_label' => 'name',
                    'expanded' => false,
                    'multiple' => true,
                    ))
//                ->add('save', SubmitType::class, array('label' => 'zadaj pytanie'))
                ->add('zapytaj', "submit")
                ->getForm();
        
       $form->handleRequest($request);
        
       if( $form->isSubmitted() & $form->isValid() ){
           $questionForm = $form->getData();
           dump($questionForm); die();
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
         
    /**
     * @Route("/getJson/{id}", name="get_json")
     */
    public function getJsonAction($id) {
        $repository = $this->getDoctrine()
                           ->getRepository('ForrestWatchBundle:Phylum');
        $phylumForKing = $repository->findBy(
            array('kingdom' => $id)
        );
        $serializedData = json_encode($phylumForKing);
        $response = new Response();
        $response->setContent($serializedData);
        return $response;
    }
    
}
