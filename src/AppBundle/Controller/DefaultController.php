<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Manager;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    
    /**
     * @Route("/home", name="home")
     */
    public function homeAction(Request $request)
    {
        return $this->render('default/home.html.twig');
    }
    
    /**
     * @Route("/hello", name="hello")
     */
    public function helloAction(Request $request)
    {
        //return new Response('<h1>Bonjour'.$name.'</h1>');
        //dump($request);
        //die();
        $name = $this->get('security.token_storage')->getToken()->getUser()->getUsername();
        // replace this example code with whatever you need
        return $this->render('default/hello.html.twig', array(
            'name' => $name,
        ));
    }
    
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        return $this->render('security/login.html.twig', [
        ]);
    }
    
    /**
     * @Route("/dashboard", name="dashboard")
     * @Method("GET")
     */
    public function dashboardAction()
    {
        $em = $this->getDoctrine()->getManager();

        $managers = $em->getRepository('AppBundle:Manager')->findAll();
        $fiches = $em->getRepository('AppBundle:Fiche')->findAll();
        $projets = $em->getRepository('AppBundle:Projet')->findAll();
        
        return $this->render('default/dashboard.html.twig', array(
            'managers' => $managers,
            'fiches' => $fiches,
            'projets' => $projets,
        ));
    }
    
    /**
     * @Route("/dashboard/{id}", name="dashboardId")
     * @Method("GET")
     */
    public function dashboardIdAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $managers = $em->getRepository('AppBundle:Manager')->findAll();
        $fiches = $em->getRepository('AppBundle:Fiche')->findBy(array('projetEx' => $id));
        $projets = $em->getRepository('AppBundle:Projet')->findAll();
        
        return $this->render('default/dashboard.html.twig', array(
            'managers' => $managers,
            'projets' => $projets,
            'fiches' => $fiches,
        ));
    }
}