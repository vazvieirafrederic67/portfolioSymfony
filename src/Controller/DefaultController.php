<?php
namespace App\Controller;

use App\Repository\ProjectRepository;
use App\Repository\TechnoRepository;
use App\Repository\SkillRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function indexAction(CategoryRepository $categoryRepository){
       
        $categories = $categoryRepository->findAll();
        
        //dump($technos);
      
        return $this->render('home.html.twig', ["categories" => $categories]);
    }

    public function skillAction(SkillRepository $skillRepository){
     
        $skills = $skillRepository->findAll();
        
        //dump($technos);
      
        return $this->render('skill.html.twig', ["skills" => $skills]);
    }

    public function technoAction(TechnoRepository $technoRepository){
     
        $technos = $technoRepository->findAll();
        
        //dump($technos);
      
        return $this->render('techno.html.twig', ["technos" => $technos]);
    }

    public function projectAction(ProjectRepository $projectRepository){
     
        $projects = $projectRepository->findAll();
        
        //dump($projets);
      
        return $this->render('project.html.twig', ["projects" => $projects]);
    }


   




}