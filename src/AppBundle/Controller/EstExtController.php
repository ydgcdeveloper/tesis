<?php
/**
 * Created by PhpStorm.
 * User: ISMEL
 * Date: 25/02/2019
 * Time: 05:11
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\EstExt;
use AppBundle\Form\EstExtType;
/**
 * @Route("/est/ext")
 */
class EstExtController extends Controller
{
/**
 * @Route("/come_pinga", name="come_pinga")
 */
    public function come_pingaAction(Request $request){
        // CONSULTA QUE DEBUELVE TODOS LOS ESTUDIANTES EXTRANJEROS
        $em = $this->getDoctrine()->getEntityManager();
        $ext_repo = $em->getRepository('AppBundle:EstExt');
        $ext = $ext_repo->findAll();

        // A CONTINUACION SE VALIDA EL FORMULARIO Y SE INSERTA Y DEBUELVE LA VARIABLE DEL FORMULARIO
        // DICHA VAR SERA LLAMADA EN EL DIALOG QUE ESTARA EN LA VISTA
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

        return $this->render('AppBundle:estudiantes extranjeros:listado_ext.html.twig', array(
            "exts" => $ext,
            'form_est_ext' => $form_est_ext->createView()
        ));

    }
    // eliminar varios elementos
    /**
     * @Route("/delete_multiple/{ids}", name="delete_multiple")
     */
    public function delete_multiple($ids, Request $request){

        /*
         * FALTA ESPECIFICAR QUE SI LOS ID SON NULOS NO INTENTE ELIMINARLOS
         *
         * */

        $em = $this->getDoctrine()->getEntityManager();
        $exts_repo = $em->getRepository('AppBundle:EstExt');// error aqui

                $i = 0;
                $j = 0;
                $cad = "";
                $iden = [];
                while($i < strlen($ids)){

                    if($ids[$i] == ','){
                        $j++;
                        $cad = "";
                        $i++;
                        continue;
                    }else{
                        $cad = $cad.$ids[$i];
                        $cad += 0;// se convierte a entero
                        $iden[$j] = $cad;
                                    $cad."";// se vuelve a convertir en cadena
                                    $i++;
                                }
                            }
        for($i = 0; $i < count($iden); $i++){
            $exts = $exts_repo->find($iden[$i]);
            $em->remove($exts);
            $em->flush();
        }
       //var_dump($iden);
        // dump(datefmt_parse($arreglo[0]));
        //die();

         return $this->come_pingaAction($request);
    }
}