<?php
/**
 * Created by PhpStorm.
 * User: ISMEL
 * Date: 17/01/2019
 * Time: 10:47
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
/**
 * @Route("/profesores")
 */

class ProfesoresController extends Controller{

    // metodo para mostrar un listado con todos los profesores:
    /**
     * @Route("/listado_profesores", name="listado_profesores")
     */
    public function profesoresAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $profs_repo = $em->getRepository('AppBundle:Profes');
        $profs = $profs_repo->findAll();

        return $this->render('AppBundle:profesores:listado.html.twig',
            array(
                "profs" => $profs
            ));
    }

    /**
     * @Route("/detalles/{id}", name="detalles")
     */
    // metodo para mostrar los detalles de un profesor:
    public function detalles_profAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $prof_repo = $em->getRepository('AppBundle:Profes');
        $prof = $prof_repo->find($id);

        return $this->render('AppBundle:profesores:detallesProf.html.twig',
            array(
                "prof" => $prof
            )

        );
    }

    // metodo para adicionar profesor:
    /**
     * @Route("/nuevo", name="nuevo")
     */
    public function form_profeAction(Request $request)
    {

        $profes = new Profes();
        $form_profe = $this->createForm(ProfesType::class, $profes);
        $form_profe->handleRequest($request);

        if($form_profe->isValid() && $form_profe->isSubmitted()) {


            $profes = $form_profe->getData();
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($profes);
            $fush = $em->flush();
            $emm = $this->getDoctrine()->getEntityManager();
            $profs_repo = $emm->getRepository('AppBundle:Profes');
            $profs = $profs_repo->findAll();

            if($fush==null){
                $status = "Se ha creado correctamente";

                return $this->render('AppBundle:profesores:listado.html.twig',
                    array(
                        'profs' => $profs
                    ));
            }else{
                $status = "No se ha creado";
            }

        }else{
            $status = null;

        }

        return $this->render('AppBundle:profesores:form_profes.html.twig',
            array(
                'form_profe' => $form_profe->createView(),
                'status' => $status,
            )
        );

    }
    // metodo para eliminar profesor
    /**
     * @Route("/eliminar/{id}", name="eliminar")
     */
    public function del_profAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $prof_repo = $em->getRepository('AppBundle:Profes');
        $prof = $prof_repo->find($id);
        $em->remove($prof);
        $em->flush();
        /*
        $profs = $prof_repo->findAll();
        return $this->render('AppBundle:profesores:nacionales.html.twig',
            array(
                "profs" => $profs
            ));
        */
        return $this->profesoresAction();
    }
    // metodo para modificar datos del profesor:
    /**
     * @Route("/editar/{id}", name="editar")
     */
    public  function edit_profAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $profs_repo = $em->getRepository('AppBundle:Profes');
        $profs = $profs_repo->find($id);
        $form_profe = $this->createForm(ProfesType::class, $profs);
        $form_profe->handleRequest($request);
        $status = "";
        if($form_profe->isSubmitted()){
            if($form_profe->isValid()){
                $profs = $form_profe->getData();
                $em->persist($profs);
                $flush = $em->flush();

                if($flush==null){
                    $status = "Se ha editado correctamente";

                    return $this->profesoresAction();
                }else{
                    $status = "No se ha editado";
                }

            }else{
                $status = null;

            }

        }
        return $this->render('AppBundle:profesores:edit_prof.html.twig',
            array(
                "status" => $status,
                "form_profe" => $form_profe->createView()
            ));
    }

}