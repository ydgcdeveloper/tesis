<?php
/**
 * Created by PhpStorm.
 * User: ISMEL
 * Date: 20/01/2019
 * Time: 03:34
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\EstExt;
use AppBundle\Form\EstExtType;
/**
 * @Route("/estudiante/extranjero")
 */
class EstudianteExtranjeroController extends Controller
{
    /**
     * @Route("/listado_extranjeros", name="listado_extranjeros")
     */
    public function extranjerosAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $exts_repo = $em->getRepository('AppBundle:EstExt');
        $exts = $exts_repo->findAll();
        /*
        foreach($exts as $ext){
            echo $ext->getTipoEst()->getNombre()."<br/ ><hr/>";
        }
        die();
        */


        return $this->render('AppBundle:estudiantes extranjeros:extranjeros.twig',
            array(
                "exts" => $exts
            ));
    }
    /**
     * @Route("/detalles_extranjero/{id}", name="detalles_extranjero")
     */
    public function detalles_extsAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $ext_repo = $em->getRepository('AppBundle:EstExt');
        $ext = $ext_repo->find($id);

        return $this->render('AppBundle:estudiantes extranjeros:detallesExts.html.twig',
            array(
                "ext" => $ext
            )

        );
    }
    /**
     * @Route("/nuevo_extranjero", name="nuevo_extranjero")
     */

    public function form_est_extAction(Request $request)
    {
        $est_ext = new EstExt();
        $form_est_ext = $this->createForm(EstExtType::class, $est_ext);
        $form_est_ext->handleRequest($request);

        if($form_est_ext->isValid()) {
            $est_ext = $form_est_ext->getData();
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($est_ext);
            $fush = $em->flush();
            if($fush==null){
                $status = "Se ha creado correctamente";

                return $this->extranjerosAction();
            }else{
                $status = "No se ha creado";
            }

        }else{
            $status = null;

        }

        return $this->render('AppBundle:estudiantes extranjeros:form_est_ext.html.twig',
            array(
                'form_est_ext' => $form_est_ext,
                'status' => $status,
                'est_ext' => $est_ext
            )
        );

    }
    // metodo para modificar datos del estudiante extranjero:
    /**
     * @Route("/modificar_extranjero/{id}", name="modificar_extranjero")
     */
    public  function edit_extranjeroAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $exts_repo = $em->getRepository('AppBundle:EstExt');
        $exts = $exts_repo->find($id);
        $form_est_ext = $this->createForm(EstExtType::class, $exts);
        $form_est_ext->handleRequest($request);
        $status = "";
        if($form_est_ext->isSubmitted()){
            if($form_est_ext->isValid()){
                $exts = $form_est_ext->getData();
                $em->persist($exts);
                $flush = $em->flush();

                if($flush==null){
                    $status = "Se ha editado correctamente";

                    return $this->extranjerosAction();
                }else{
                    $status = "No se ha editado";
                }

            }else{
                $status = null;

            }

        }
        return $this->render('AppBundle:estudiantes extranjeros:edit_extranjeros.html.twig',
            array(
                "status" => $status,
                "form_est_ext" => $form_est_ext->createView()
            ));
    }

    // metodo para eliminar
    /**
     * @Route("/eliminar_extranjero/{id}", name="eliminar_extranjero")
     */
    public function del_extranjeroAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $ext_repo = $em->getRepository('AppBundle:EstExt');
        $ext = $ext_repo->find($id);
        if($ext != null){
        $em->remove($ext);
        $em->flush();
        }
        /*
        $profs = $prof_repo->findAll();
        return $this->render('AppBundle:profesores:nacionales.html.twig',
            array(
                "profs" => $profs
            ));
        */
        return $this->extranjerosAction();
    }

}