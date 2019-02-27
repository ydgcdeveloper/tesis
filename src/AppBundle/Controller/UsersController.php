<?php
/**
 * Created by PhpStorm.
 * User: ISMEL
 * Date: 26/01/2019
 * Time: 10:19
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Users;
use AppBundle\Form\UsersType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request;
/**
 * @Route("/user")
 */
class UsersController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
{
    /*
    $authenticationUtils = $this->get("security.authentication_utils");
    $error = $authenticationUtils->getLastAuthenticationError();
    $lastUsername = $authenticationUtils->getLastUsername();

*/
    $status ="0";
    $id = 0;
    $mej_enviado = null;
        return $this->render('AppBundle:User:login.html.twig', array(
            "mej_enviado" => $mej_enviado,
            "status" => $status,
            "id" => $id
        ));

}
    /**
     * @Route("/perfil/{status}/{id}", name="perfil")
     */
    public function perfilAction($status, $id)
{
    // DATOS DE TABLA USUARIOS
    $em = $this->getDoctrine()->getEntityManager();
    $user_repo = $em->getRepository('AppBundle:Users');
    $user = $user_repo->find(1);



    return $this->render('AppBundle:User:perfil.html.twig', array(
        "user" => $user,
        "status" => $status,
        "id" => $id

    ));
}

    /**
     * @Route("/perfil2/{status}/{id}", name="perfil2")
     */
    public function perfil2Action($status, $id)
{
    $em = $this->getDoctrine()->getEntityManager();
    $user_repo = $em->getRepository('AppBundle:Users');
    $user = $user_repo->find(2);

    // DATOS DE LA TABLA MENSAJES
    $emm =$this->getDoctrine()->getEntityManager();
    $menj_repo = $emm->getRepository('AppBundle:Menssajes');
    $menj = $menj_repo->findAll();

    return $this->render('AppBundle:User:perfil2.html.twig', array(
        "user" => $user,
        "menj" => $menj,
        "status" => $status,
        "id" => $id
    ));
}
    /**
     * @Route("/send_messaje_Mily", name="send_messaje_Mily")
     */
    public function send_messajeAction(Request $request, $id){
        $em = $this->getDoctrine()->getEntityManager();
        $user_repo = $em->getRepository('AppBundle:Users');
        $user = $user_repo->find($id);
        $form_user = $this->createForm(UsersType::class, $user);
        $form_user->handleRequest($request);
        $status = "";
        if($form_user->isSubmitted()){
            if($form_user->isValid()){
                $user = $form_user;
                $em->persist($user);
                $flush = $em->flush();

                if($flush==null){
                    $status = "Se ha enviado correctamente";

                    return $this->perfil2Action();
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
}