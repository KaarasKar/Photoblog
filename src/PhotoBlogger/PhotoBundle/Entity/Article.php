<?php
// src/AppBundle/Entity/User.php

namespace PhotoBlogger\PhotoBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\Extension\Core\Type\DateType;
/**
 * @ORM\Entity
 * @ORM\Table(name="article")
 * @ORM\HasLifecycleCallbacks()
 *
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="art", type="string", length=255)
     */
    protected $art;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set art
     *
     * @param string $com
     *
     * @return Article
     */
    public function setArt($art)
    {
        $this->art = $art;

        return $this;
    }

    /**
     * Get com
     *
     * @return string
     */
    public function getArt()
    {
        return $this->art;
    }


}
