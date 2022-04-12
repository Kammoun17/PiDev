<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/crud/message")
 */
class CrudMessageController extends AbstractController
{
    /**
     * @Route("/supp/{id}",name="d")
     */
function Delete($id){
    $repo=$this->getDoctrine()->getRepository(Message::class);
    $message=$repo->find($id);
    $em=$this->getDoctrine()->getManager();
    $em->remove($message);
    $em->flush();
    return $this->redirectToRoute('show_discussion');

}

    /**
     * @param Request $request
     * @param MessageController $c
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/discussion",name="show_discussion")
     */

    function Add(Request $request,MessageController $c){

        $message=new Message();
        $form=$this->createForm(MessageType::class,$message);
        $form->handleRequest($request);
        $message->setIdUtilisateur(12);
        $message->setIdDiscussion(2);
        if($form->isSubmitted()&&$form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();

        }


        return $this->render('discussion.html.twig',[
            'form'=>$form->createView(),'discussion'=>$discussion
        ]);
    }



}
