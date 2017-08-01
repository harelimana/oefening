<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ImageController extends Controller
{
    /**
     * @Route("/addImage")
     */
    public function addImageAction()
    {
        $image = new images;
        $form = $this->createForm(ImageType::class, $image);
        /* ->add('username', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
         ->add('profile_picture', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
         ->add('Sauver', SubmitType::class, array('attr' => array('label' => 'Create Todo','class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))
         ->getForm(); */

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();
            $this->addflash(
                'notice',
                'Image ajoutée'
            );
            return $this->redirectToroute('retrieveAllImages');
        }
        return $this->render('AppBundle:Image:add_image.html.twig', array('form'=>$form->createView())
            // ...
        );
    }

    /**
     * @Route("/deleteImage")
     */
    public function deleteImageAction()
    {
        return $this->render('AppBundle:Image:delete_image.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/findImage")
     */
    public function findImageAction()
    {
        return $this->render('AppBundle:Image:find_image.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/retrieveAllImages")
     */
    public function retrieveAllImagesAction()
    {
        return $this->render('AppBundle:Image:retrieve_all_images.html.twig', array(
            // ...
        ));
    }

}
