<?php

namespace PolcodeProductBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use PolcodeProductBundle\Document\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * PolcodeProduct controller.
 *
 * @Route("/product")
 */
class PolcodeProductController extends Controller
{
    /**
     * Lists all PolcodeProduct entities.
     *
     * @Route("/", name="product_index")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')") 
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->get('doctrine_mongodb');

        $polcodeProducts = $em->getRepository('PolcodeProductBundle:Product')->findAll();

        return $this->render('polcodeproduct/index.html.twig', array(
            'polcodeProducts' => $polcodeProducts,
        ));
    }

    /**
     * Finds and displays a PolcodeProduct entity.
     *
     * @Route("/{id}", name="product_show")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @Method("GET")
     */
    public function showAction(Product $polcodeProduct)
    {

        return $this->render('polcodeproduct/show.html.twig', array(
            'polcodeProduct' => $polcodeProduct,
        ));
    }
    
    
    /**
     * Finds and displays a PolcodeProduct entity by its slug.
     *
     * @Route("/show/{slug}", name="product_show_by_slug")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @Method("GET")
     */
    public function showBySlugAction( $slug ) 
    {
        $em = $this->get('doctrine_mongodb');
        
        $polcodeProduct = $em->getRepository('PolcodeProductBundle:Product')->findOneBySlug($slug);
        
        return $this->render('polcodeproduct/show.html.twig', array(
            'polcodeProduct' => $polcodeProduct,
        ));
        
    }
    
    
    
    
    
}
