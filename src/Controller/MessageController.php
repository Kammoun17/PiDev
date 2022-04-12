<?php

namespace App\Controller;

use App\Entity\Discussion;
use App\Entity\Message;
use App\Entity\User;
use App\Form\MessageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{



    public function UserIdDiscussion($idUtilisateur){


    $discussions = $this->getDoctrine()->getRepository(Message::class)->findBy( array('idUtilisateur'=>$idUtilisateur));
    $tab = array();
    foreach ($discussions as $d){
    $id=$d->getIdDiscussion();

    if(! in_array($id,$tab)){
    $tab[] = $id;
    }

    }

    return $tab ;
    }





    /**
     * @Route("/conversation", name="show_conversation")
     */

    public function ShowConversation(){
        $tab=$this->UserIdDiscussion(12);

    }

    /**
     * @Route("/admin", name="show_admin")
     */
    public function show(): Response
    {
        return $this->render('AdminChat.html.twig',['controller_name' => 'MessageController']);

    }
public function Discussion($idDiscussion){
        $repo=$this->getDoctrine()->getRepository(Message::class);
        $discussion=$repo->findBy(array('idDiscussion'=>$idDiscussion));
        return $discussion;
}

    /**
     * @Route("/discussion", name="show_discussion")
     */
    public function ShowDiscussion(Request $request): Response
    {
        $tab=$this->UserIdDiscussion(12);
        $discussion =$this->Discussion(2);
        $message=new Message();
        $form=$this->createForm(MessageType::class,$message);
        $form->add('envoyer',SubmitType::class);
        $form->handleRequest($request);



        $repo=$this->getDoctrine()->getRepository(User::class);
        $user=$repo->find(12);
        $message->setIdUtilisateur($user);
        $date = new \DateTime();


        $message->setDate($date);
        $repo1=$this->getDoctrine()->getRepository(Discussion::class);
        $dis=$repo1->find(2);
        $message->setIdDiscussion($dis);
        if($form->isSubmitted()&&$form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();
            return $this->redirectToRoute('show_discussion');

        }
        return $this->render('discussion.html.twig', ['form'=>$form->createView(),
            'controller_name' => 'MessageController','discussion'=>$discussion
        ]);
    }



}
