<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Form\CategorieType;
use AppBundle\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
 //use Symfony\Component\Form\Extension\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CategorieController extends Controller
{
    /**
     * @Route("/addCategorie", name="addCateg")
     */
    public function addCategorieAction(Request $request)
    {
        $categorie = new Categorie;
        $form = $this->createForm(CategorieType::class, $categorie)
            ->add('nom', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('Sauver', SubmitType::class, array('attr' => array('label' => 'Create Todo','class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            $this->addflash(
                'notice',
                'Catégorie ajoutée'
            );
            return $this->redirectToroute('retrieveAllCat');
        }
        return $this->render('AppBundle:Categorie:add_categorie.html.twig', array('form' => $form->createView())
            // ...
        );
    }

    /**
     * @Route("/deleteCategorie/{id}")
     */
    public function deleteCategorieAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $categorie=$em->getRepository('AppBundle:Categorie')->find($id);

        $em->remove($categorie);
        $em->flush();

        $this->addflash(
            'notice',
            'Categorie supprimée'
        );
        return $this->reredirectToRoute('retrieveAllCat'
            // ...
        );
    }

    /**
     * @Route("/findCategorie")
     */
    public function findCategorieAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('AppBundle:Categorie')->find($id);
        
        return $this->render('AppBundle:Categorie:find_categorie.html.twig', array('form'=>createView($categorie)
            // ...
        ));
    }

    /**
     * @Route("/retrieveAllCat",name="retrieveAllCat")
     */
    public function retrieveAllCatAction()
    {
        $categorie = $this->getDoctrine()
                          ->getRepository('AppBundle:Categorie')
                          ->findAll();

        return $this->render('AppBundle:Categorie:retrieve_all_cat.html.twig', array('categorie'=>$categorie
            // ...
        ));
    }

}
