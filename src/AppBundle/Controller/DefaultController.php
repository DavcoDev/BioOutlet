<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request)
    {
	    $repository = $this->getDoctrine()->getRepository('AppBundle:Etalage');

	    // replace this example code with whatever you need
	    return $this->render( 'pages/index.html.twig', array(
		    'title' => 'Index',
		    'imgBackground' => 'img/background-bio.jpg',
		    'subHeader' => 'Accueil',
		    'headerH1' => 'Bio Outlet',
		    'etalages' => $repository->findAll())

	    );
    }
}
