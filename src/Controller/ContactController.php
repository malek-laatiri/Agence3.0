<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Choix;
use App\Entity\Equipement;
use App\Entity\Heat;
use App\Entity\Property;
use App\Entity\Rooms;
use App\Form\PropertyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;






class ContactController extends AbstractController
{
    /**
     * @return Response
     */
    public function create(Request $request,ObjectManager $manager){
        //$user = $this->container->get('security.context')->getToken()->getUser();
        $connecteduser=$this->getUser()->getId();
        dump($connecteduser);

        $property=new Property();
        $category=new Category();
        $chambres=new Rooms();
        $choix=new Choix();
        $heat=new Heat();
        $equipement=new Equipement();
        $property->setCreatedby($connecteduser);
        $form=$this->createForm(PropertyType::class,$property);
        $form->handleRequest($request);




        if($form->isSubmitted()) {

            $property=$form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($property);
            $entityManager->flush();
            return $this->redirectToRoute('task_success');




        }

        return $this->render('contact/index.html.twig',['formmaison'=>$form->createView()]);
    }


    public function index():Response{
        return $this->render('return.html.twig');
    }




}