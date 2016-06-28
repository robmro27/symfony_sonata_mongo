<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Response;

use Acme\StoreBundle\Document\Product;
use AppBundle\Document\BlogPost;
use AppBundle\Document\Category;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        
        $category = new Category();
        $category->setName('Sample category');
        $dm->persist($category);
        
        $blogPost = new BlogPost();
        $blogPost->setTitle('Test Blog post');
        $blogPost->setBody('Test blog post body');
        $blogPost->setDraft(true);
        $blogPost->setCategory($category);

        $dm->persist($blogPost);
        $dm->flush();

        return new Response('Created product id '.$blogPost->getId());
        
        //return $this->render('AcmeStoreBundle:Default:index.html.twig');
    }
}
