<?php
/**
 * Created by PhpStorm.
 * User: ISMEL
 * Date: 10/02/2019
 * Time: 01:59
 */

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

class PaisController extends Controller
{

    /**
     * @Route("/listado_paises", name="listado_paises")
     */
    public function paisesAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $paises_repo = $em->getRepository('AppBundle:Pais');
        $paises = $paises_repo->findAll();

        return $this->render('AppBundle:paises:paises.html.twig',
            array(
                "paises" => $paises
            ));
    }
}