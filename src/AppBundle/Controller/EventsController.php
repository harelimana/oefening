<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Form\EventsType;
use AppBundle\Entity\Event;
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
        $events = new Event;
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
        return $this->render('AppBundle:Event:add_event.html.twig', array('form' => $form->createView())
            // ...
        );

    }

    /**
     * @Route("/deleteEvent")
     */
    public function deleteEventAction()
    {
        return $this->render('AppBundle:Event:delete_event.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/findEvent/{id}")
     */
    public function findEventAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('AppBundle:Event')->find($id);
        return $this->render('AppBundle:Event:find_event.html.twig', array('form'=> $form->createView($event)            // ...
        ));
    }

    /**
     * @Route("/retrieveAllEvents", name="retrieveAllEvents")
     */
    public function retrieveAllEventsAction()
    {
        $event = $this->getDoctrine()
            ->getRepository('AppBundle:Event')
            ->findAll();
        return $this->render('AppBundle:Event:retrieve_all_events.html.twig', array('event'=>$event)
            // ...
        );
    }

}
