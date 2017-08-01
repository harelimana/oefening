<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Form\EventsType;
use AppBundle\Entity\events;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Form\Extension\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EventsController extends Controller
{
    /**
     * @Route("/addEvent",name="addevents")
     */
    public function addEventAction(Request $request)
    {
        $events = new event;
        $form = $this->createForm(EventsType::class, $events);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($events);
            $em->flush();
            $this->addflash(
                'notice',
                'Evenement ajouté'
            );
            return $this->redirectToroute('retrieveAllEvents');
        }
        return $this->render('AppBundle:Events:add_event.html.twig', array('form' => $form->createView())
            // ...
        );

    }

    /**
     * @Route("/deleteEvent")
     */
    public function deleteEventAction()
    {
        return $this->render('AppBundle:Events:delete_event.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/findEvent")
     */
    public function findEventAction()
    {
        return $this->render('AppBundle:Events:find_event.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/retrieveAllEvents", name="retrieveAllEvents")
     */
    public function retrieveAllEventsAction()
    {
        return $this->render('AppBundle:Events:retrieve_all_events.html.twig', array(
            // ...
        ));
    }

}
