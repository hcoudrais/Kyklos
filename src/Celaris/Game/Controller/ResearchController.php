<?php

namespace Celaris\Game\Controller;

use Celaris\Game\Controller\GeneralController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use \Symfony\Component\HttpFoundation\Request as Request;

class ResearchController extends GeneralController
{
    /**
     * @Route ("/research", name="menu_research", options={"expose"=true})
     * @Template("CelarisGameBundle:ContentMenu:research.html.twig")
     */
    public function researchAction(Request $request)
    {
        if(!$request->isXmlHttpRequest())
            return $this->redirect($this->generateUrl('home_page'));

        $allResearch = $this
            ->getRepository('CelarisGameBundle:Research')
            ->getAllResearch()
        ;

        return array('allResearch' => $allResearch);
    }
}
