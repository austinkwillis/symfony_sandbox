<?php

namespace Austin\PipelineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\ORM\EntityRepository;
use Austin\PipelineBundle\Entity;
use Austin\PipelineBundle\Entity\thingRepository;
use Austin\PipelineBundle\Entity\thing;
use Austin\PipelineBundle\Entity\categoryRepository;
use Austin\PipelineBundle\Entity\category;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
		 $allThings = $this->getDoctrine()
			 ->getRepository('Austin\PipelineBundle\Entity\thing')
			 ->findAll();
	
		return $this->render(
			 'AustinPipelineBundle:Default:index.html.twig', array('allThings'=>$allThings));
            

        //return $this->render('AustinPipelineBundle:Default:visuals.html.twig');
    }
    
    
	
	/**
     * @Route("/tracker/{name}/{countChange}/{direction}")
     * @Template()
     */
	public function trackerAction($name, $countChange, $direction)
	{
		$em = $this->getDoctrine()->getManager();
	    $thing = $em->getRepository('Austin\PipelineBundle\Entity\thing')->findOneByName($name);

		if (!$thing) { //create new
		    $thing = new thing();
			$thing->setName($name);
			$em->persist($thing);
		}
	
		if($direction == 'up') { //increment else decrement
		    $thing->setCount(($thing->getCount()+$countChange));
		}
		else{
			$thing->setCount($thing->getCount()-$countChange);
		}
	//Save
    
    $em->flush();

    return new Response( $thing->getName().' now has a count of '.$thing->getCount());
	}
	
	/**
     * @Route("/category/{name}/{isAdding}/{thingName}")
     * @Template()
     */
	public function categoryAction($name, $isAdding, $thingName)
	{
		$em = $this->getDoctrine()->getManager();
	    $category = $em->getRepository('Austin\PipelineBundle\Entity\category')->findOneByName($name);
	    $thing = $em->getRepository('Austin\PipelineBundle\Entity\thing')->findOneByName($thingName);

		if (!$category) { //create new
		    $category = new category();
			$category->setName($name);
			$em->persist($category);
		}
        $output = "";
		if($isAdding == 'add') { //add else remove
            $output = " added to category: ";
		    if(!$thing){
                
				$thing = new thing();
				$thing->setName($thingName);
				$thing->setCount(0);
				$em->persist($thing);
			}
            $thing->setCategory($name);
            
		}
		else{
            $output = " removed from category: ";
			if($thing){
				$thing->setCategory("none");
			}
		}
	//Save
    
    $em->flush();

    return new Response( $thingName.$output.$name);
	}
}
