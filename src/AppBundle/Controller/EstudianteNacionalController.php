<?php
/**
 * Created by PhpStorm.
 * User: ISMEL
 * Date: 18/01/2019
 * Time: 11:55
 */
namespace AppBundle\Controller;


use AppBundle\Entity\EstNac;
use AppBundle\Form\EstNacType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * @Route("/estudiante/nacional")
 */
class EstudianteNacionalController extends Controller{
// metodo
    /**
     * @Route("/listar_nacionales", name="listar_nacionales")
     */
    public function nacionalesAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $nacs_repo = $em->getRepository('AppBundle:EstNac');
        $nacs = $nacs_repo->findAll();
        return $this->render('AppBundle:estudiantes nacionales:nacionales.html.twig',
            array(
                "nacs" => $nacs
            ));
    }
    /**
     * @Route("/detalles_de/{id}", name="detalles_de")
     */
    public function detalles_nacsAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $nacs_repo = $em->getRepository('AppBundle:EstNac');
        $nac = $nacs_repo->find($id);

        return $this->render('AppBundle:estudiantes nacionales:detallesNac.html.twig',
            array(
                "nac" => $nac
            )

        );
    }
    // metodo para adicionar estudiante nacional:
    /**
     * @Route("/nuevo_estudiante_nacional", name="nuevo_estudiante_nacional")
     */
    public function form_nacionalesAction(Request $request)
    {

        $nacs = new EstNac();
        $form_nac = $this->createForm(EstNacType::class, $nacs);
        $form_nac->handleRequest($request);

        if($form_nac->isValid() && $form_nac->isSubmitted()) {
            $nacs = $form_nac->getData();
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($nacs);

            $fush = $em->flush();
            if($fush==null){
                $status = "Se ha creado correctamente";

                return $this->nacionalesAction();
            }else{
                $status = "No se ha creado";
            }

        }else{
            $status = null;

        }

        return $this->render('AppBundle:estudiantes nacionales:form_nacionales.html.twig',
            array(
                'form_nac' => $form_nac->createView(),
                'status' => $status,
            )
        );

    }

// metodo para modificar datos del estudiante nacional:
    /**
     * @Route("/modificar_estudiante_nacional/{id}", name="nuevo_estudiante_nacional")
     */
    public  function edit_nacionalesAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $nacs_repo = $em->getRepository('AppBundle:EstNac');
        $nacs = $nacs_repo->find($id);
        $form_nac = $this->createForm(EstNacType::class, $nacs);
        $form_nac->handleRequest($request);
        $status = "";
        if($form_nac->isSubmitted()){
            if($form_nac->isValid()){
               $nacs = $form_nac->getData();
                $em->persist($nacs);
                $flush = $em->flush();

                if($flush==null){
                    $status = "Se ha editado correctamente";

                    return $this->nacionalesAction();
                }else{
                    $status = "No se ha editado";
                }

            }else{
                $status = null;

            }

        }
        return $this->render('AppBundle:estudianes nacionales:edit_nacionales.html.twig',
            array(
                "status" => $status,
                "form_nac" => $form_nac->createView()
            ));
    }
    /**
     * @Route("/eliminar_nacional/{id}", name="eliminar_nacional")
     */
    public function eliminarNacionalAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $nac_repo = $em->getRepository('AppBundle:EstNac');
        $nac = $nac_repo->find($id);
        $em->remove($nac);
        $em->flush();
        return $this->profesoresAction();
    }
}