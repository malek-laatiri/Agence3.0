<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 20/01/2019
 * Time: 00:29
 */

namespace App\Admin;
use App\Form\CategoryType;
use App\Form\ChoixType;
use App\Form\EquipementType;
use App\Form\HeatType;
use App\Form\RoomsType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Vich\UploaderBundle\Form\Type\VichImageType;



class PropertyAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title')
            ->add('description')
            ->add('surface')
            ->add('bedroom')
            ->add('floor')
            ->add('price')
            ->add('city')
            ->add('address')
            ->add('postal_code')
            ->add('rooms',RoomsType::class)
            ->add('propertyname',CategoryType::class)

            ->add('choix',ChoixType::class)
            ->add('heat',HeatType::class)
            ->add('equipement',EquipementType::class);


    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title')
            ->add('description')
            ->add('surface')
            ->add('bedroom')
            ->add('floor')
            ->add('price')
            ->add('city')
            ->add('address')
            ->add('postal_code')
            ->add('rooms')
            ->add('propertyname')

            ->add('choix')
            ->add('heat')
            ->add('equipement')
            ->add('allowed');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('title')
            ->add('description')
            ->add('surface')
            ->add('bedroom')
            ->add('floor')
            ->add('price')
            ->add('city')
            ->add('address')
            ->add('postal_code')
            ->add('rooms')
            ->add('propertyname')

            ->add('choix')
            ->add('heat')
            ->add('equipement')
            ->add('allowed');

    }
}















