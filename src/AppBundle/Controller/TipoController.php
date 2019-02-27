<?php
/**
 * Created by PhpStorm.
 * User: ISMEL
 * Date: 20/01/2019
 * Time: 03:35
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\TipoEst;
use AppBundle\Form\TipoEstType;
use Symfony\Component\HttpFoundation\Request;
/**
 * @Route("/tipos")
 */
class TipoController extends Controller
{
    /**
     * @Route("/tipos_extranjero", name="tipos_extranjero")
     */
    public function tipoAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $tipos_repo = $em->getRepository('AppBundle:TipoEst');
        $tipos = $tipos_repo->findAll();
        return $this->render('AppBundle:tipo extranjero:tipo.html.twig',
            array(
                "tipos" => $tipos
            ));
    }
    /**
     * @Route("/nuevo_tipo_extranjero", name="nuevo_tipo_extranjero")
     */
    public function form_tipoAction(Request $request)
    {
        $tipo = new TipoEst();
        $form_tipo = $this->createForm(TipoEstType::class, $tipo);
        $form_tipo->handleRequest($request);

        if($form_tipo->isValid()) {

            $tipo = $form_tipo->getData();
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($tipo);
            $fush = $em->flush();

            if($fush==null){
                $status = "Se ha creado correctamente";

                return $this->tipoAction();
            }else{
                $status = "No se ha creado";
            }

        }else{
            $status = null;

        }

        return $this->render('AppBundle:tipo extranjero:form_tipo.html.twig',
            array(
                'form_tipo' => $form_tipo->createView(),
                'status' => $status
            )
        );

    }
    /**
     * @Route("/modificar_tipo_extranjero/{id}", name="modificar_tipo_extranjero")
     */
    public  function edi_tipoAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $tipo_repo = $em->getRepository('AppBundle:TipoEst');
        $tipos = $tipo_repo->find($id);
        $form_tipo = $this->createForm(TipoEstType::class, $tipos);
        $form_tipo->handleRequest($request);
        $status = "";
        if($form_tipo->isSubmitted()){
            if($form_tipo->isValid()){
                $tipos = $form_tipo->getData();
                $em->persist($tipos);
                $flush = $em->flush();

                if($flush==null){
                    $status = "Se ha editado correctamente";

                    return $this->tipoAction();
                }else{
                    $status = "No se ha editado";
                }

            }else{
                $status = null;

            }

        }
        return $this->render('AppBundle:tipo extranjero:edi_tipo.html.twig',
            array(
                "status" => $status,
                "form_tipo" => $form_tipo->createView()
            ));
    }
    /**
     * @Route("/eliminar_tipo_extranjero/{id}", name="eliminar_tipo_extranjero")
     */
    public function del_tipoAction($id)
    {

        $em = $this->getDoctrine()->getEntityManager();
        $emm = $this->getDoctrine()->getEntityManager();
        $tipo_repo = $em->getRepository('AppBundle:TipoEst');
        $ext_repo = $emm->getRepository('AppBundle:EstExt');
        $exts = $ext_repo->findAll();

        $tipo = $tipo_repo->find($id);
        $flag = true;
        if($tipo != null){
            foreach ($exts as $ext) {// RECORRO LA TABLA DE LOS EXTRANJEROS
                if ($ext->getTipoEst()->getId() == $id) {//SI ENCUENTRA  EL ID A ELIMINAR EN ESA TABLA
                    $flag = false;
                }

            }
            if ($flag) {
                $em->remove($tipo);
                $em->flush();
            } else {
                return $this->render('AppBundle:User:modal.html.twig');
            }
        }
        /*
        $profs = $prof_repo->findAll();
        return $this->render('AppBundle:profesores:nacionales.html.twig',
            array(
                "profs" => $profs
            ));
        */
        return $this->tipoAction();

    }


}