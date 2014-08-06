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

class VisualsController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function visualsAction()
    {
		return $this->render(
			'AustinPipelineBundle:Default:visuals.html.twig'
			);
    }
	

}
