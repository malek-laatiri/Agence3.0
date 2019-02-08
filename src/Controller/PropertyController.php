<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 16/01/2019
 * Time: 11:58
 */

namespace App\Controller;


use App\Entity\Property;
use App\Entity\Recherche;
use App\Form\RechercheSearchType;
use App\Form\SearchType;
use App\Form\SearchTyperecherche;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Sonata\DatagridBundle\Pager\PageableInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Cocur\Slugify\Slugify;
use Knp\Bundle\PaginatorBundle\Definition\PaginatorAware;
use Knp\Bundle\PaginatorBundle\Definition\PaginatorAwareInterface;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormTypeInterface;

class PropertyController extends AbstractController
{
    private $repository;

    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index(ObjectManager $manager, Request $request): Response

    {
        $recherche = new Recherche();
       dump($recherche);
      $form=$this->createForm(RechercheSearchType::class,$recherche);
       $form->handleRequest($request);


        $Property = $this->repository->findallvisible();
        //$x=$this->repository->findAll();
        $adapter = new ArrayAdapter($Property);
        $pagerfanta = new Pagerfanta($adapter);


        dump($form);
        return $this->render('property/index.html.twig', ['x' => $Property, 'current_menu' => 'properties', 'form' => $form->createView(), 'Property' => $Property, 'my_pager' => $pagerfanta]); #resultat du findall
    }

    /**
     * @Route("/biens/{slug}_{id}", name="property.show",requirements={"slug":"[a-z0-9\-]*"})
     * @param Property $property
     * @return Response
     */

    public function show($slug, $id): Response
    {
        $property = $this->repository->find($id);
        return $this->render('show.html.twig', [
            'property' => $property,
            'current_menu' => 'preperties'
        ]);
    }




}