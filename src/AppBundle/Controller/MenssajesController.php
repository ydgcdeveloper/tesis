<?php
/**
 * Created by PhpStorm.
 * User: ISMEL
 * Date: 27/01/2019
 * Time: 01:02
 */

namespace AppBundle\Controller;


use AppBundle\Form\MenssajesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Menssajes;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\TipoEst;
use AppBundle\Form\TipoEstType;
//use Symfony\Component\HttpFoundation\Request;
/**
 * @Route("/menssajes")
 */
class MenssajesController extends Controller
{


    /**
     * @Route("/send_messaje/{id}", name="send_messaje")
     */
    public function send_messajeAction(Request $request, $id){
        $em = $this->getDoctrine()->getEntityManager();
        $user_repo = $em->getRepository('AppBundle:Users');
        $user = $user_repo->find($id);

        $mej = new Menssajes();
        $form_mej = $this->createForm(MenssajesType::class, $mej);
        $form_mej->handleRequest($request);
        $status = "0";
        if($form_mej->isValid()){
            $mej = $form_mej->getData();
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($mej);
            $fush = $em->flush();

            if($fush==null){
                $status = "1";

                return $this->render('AppBundle:User:mensajes.html.twig', array(
                   "status" => $status,
                    "id" => $id,
                    "mej_enviado" => $mej
                    /* Si entra aqui es porque se ha enviado un mensaje
                     * */
                ));
            }else{
                $status = "0";
            }

        }else{
            $status = null;
        }

        return $this->render('AppBundle:User:mensajes.html.twig',
            array(
                "status" => $status,
                "user" => $user,
                "form_mej" => $form_mej->createView()
            ));

    }

    /**
     * @Route("/mensajes/{id}", name="mensajes")
     *
     */
    public function mensajesAction($id){

        // DATOS DE LA TABLA MENSAJES

        $emm =$this->getDoctrine()->getEntityManager();
        $menj_repo = $emm->getRepository('AppBundle:Menssajes');
        $menj = $menj_repo->findAll();

        // DATOS DEL USUARIO
        $em = $this->getDoctrine()->getEntityManager();
        $user_repo = $em->getRepository('AppBundle:Users');
        $user = $user_repo->find($id);

        die();/*
        return $this->render('AppBundle:User:mensajes.html.twig',
            array(
                "menj" => $menj,
                "user" => $user

            ));
*/
}
    /**
     * @Route("/eliminar_mensaje/{id}/{idd}", name="eliminar_mensaje")
     */
    function eliminar_mensajeAction($id, $idd){
        if($id != null) {
        $em = $this->getDoctrine()->getEntityManager();
        $mensaje_repo = $em->getRepository('AppBundle:Menssajes');
        $mensajes = $mensaje_repo->find($id);


            if($mensajes != null){
            $em->remove($mensajes);
            $em->flush();
            }else{
                dump('el mensaje a sido eliminado, no te hagas el listo');
            }
        }
        // DATOS DE LA TABLA MENSAJES

        $emm =$this->getDoctrine()->getEntityManager();
        $menj_repo = $emm->getRepository('AppBundle:Menssajes');
        $menj = $menj_repo->findAll();

        // DATOS DEL USUARIO
        $em = $this->getDoctrine()->getEntityManager();
        $user_repo = $em->getRepository('AppBundle:Users');
        $user = $user_repo->find($idd);// el error aqui esta

        return $this->render('AppBundle:User:mensajes.html.twig', array(
            "menj" => $menj,
            "user" => $user
        ));
    }
}
