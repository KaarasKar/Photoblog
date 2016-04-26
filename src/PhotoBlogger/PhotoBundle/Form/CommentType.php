<?php


namespace PhotoBlogger\PhotoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterFace $builder, array $options)
    {
       // $builder->add('user','text');
        $builder->add('comment','textarea');
    }

    public function getName()
    {
        return 'photoblogger_photobundle_commenttype';
    }
}