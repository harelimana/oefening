<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Form\Extension\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserController extends Controller
{
    /**
     * @Route("/addUser", name="adduser")
     */
    public function addUserAction(Request $request)
    {
        $user = new User;
        $form = $this->createForm(UserType::class, $user);
         /* ->add('username', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
          ->add('profile_picture', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
          ->add('Sauver', SubmitType::class, array('attr' => array('label' => 'Create Todo','class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))
          ->getForm(); */

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addflash(
                'notice',
                'User ajoutée'
            );
            return $this->redirectToroute('retrieveAllUsers');
        }
        return $this->render('AppBundle:User:add_user.html.twig', array('form' => $form->createView())
            // ...
        );
    }

    /**
     * @Route("/deleteUser")
     */
    public function deleteUserAction()
    {
        return $this->render('AppBundle:User:delete_user.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/findUser")
     */
    public function findUserAction()
    {
        return $this->render('AppBundle:User:find_user.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/retrieveAllUsers", name="retrieveAllUsers")
     */
    public function retrieveAllUsersAction()
    {
        $user = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findAll();
        return $this->render('AppBundle:User:retrieve_all_users.html.twig', array('user'=>$user
            // ...
        ));
    }

}
