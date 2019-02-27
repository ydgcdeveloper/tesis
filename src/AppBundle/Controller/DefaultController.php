<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EstExt;
use AppBundle\Entity\Profes;
use AppBundle\Form\EstExtType;
use AppBundle\Form\TipoEstType;
use Proxies\__CG__\AppBundle\Entity\TipoEst;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ProfesType;


/**
 * @Route("/sesion")
 */


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function mainAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle::main.html.twig');
    }
    /**
     * @Route("/reportes", name="reportes")
     */
    public function reportesAction()
    {
        return $this->render('AppBundle:reportes:reportes.html.twig');
    }
    /**
     * @Route("/expedientes", name="expedientes")
     */
    public function expedientesAction()
    {
        return $this->render('AppBundle:expedientes:expedientes.html.twig');
    }
    /**
     * @Route("/visas", name="visas")
     */
    public function visaAction()
    {
        return $this->render('AppBundle:visas:visas.html.twig');
    }
    /**
     * @Route("/reporte1", name="reporte1")
     */
    public function reporte1Action()
    {
        return $this->render('AppBundle:reportes:reporte1.html.twig');
    }
}
