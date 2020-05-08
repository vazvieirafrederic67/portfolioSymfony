<?php
namespace App\Controller;

use App\Entity\Project;
use App\Entity\Techno;
use App\Entity\Skill;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\TechnoRepository;
use App\Repository\SkillRepository;
use App\Repository\CategoryRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




class DaschboardController extends AbstractController
{

    public function daschAction(Request $request, CategoryRepository $categoryRepository, TechnoRepository $technoRepository, SkillRepository $skillRepository, ProjectRepository $projectRepository ){
       

                $categories = $categoryRepository->findAll();
                 //on déclare une nouvelle categorie (vide)
                $category = new Category();
                //un créé un nouveau formulaire basé sur une entity (dans ce cas, c'est une categorie)
                $formCategory = $this->createForm('App\Form\InsertionCategoryType',$category);
                //on dit au formulaire d'écouter les envois de request
                $formCategory->handleRequest($request);

                 //si le formulaire est envoyé, alors faire le code dans le if
                if($formCategory->isSubmitted()){
                    //hydrater mon entity (qui pour le moment est vide) avec les infos de mon formulaire
                    $category = $formCategory->getData();
                    //je récupère le manager pour pouvoir sauvegarder mon entity dans la base de données
                    $manager = $this->getDoctrine()->getManager();
                    //je demande a Doctrine de préparer la sauvegarde de mon entity job
                    $manager->persist($category);
                    //j'exécute la sauvegarde de mon entity job
                    $manager->flush();
                    //je redirige vers la route de mon choix (dans ce cas, c'est la route qui a le nom 'home'
                    return $this->redirectToRoute('daschboard');
                }
         
        
        

        //$categories = $categoryRepository->findAll();
        $projects = $projectRepository->findAll();
        $technos = $technoRepository->findAll();
        $skills = $skillRepository->findAll();
        
       
       
        //on déclare une nouvelle categorie (vide)
        $category = new Category();
        //un créé un nouveau formulaire basé sur une entity (dans ce cas, c'est une categorie)
        $formCategory = $this->createForm('App\Form\InsertionCategoryType',$category);
        //on dit au formulaire d'écouter les envois de request
        $formCategory->handleRequest($request);
        

            //si le formulaire est envoyé, alors faire le code dans le if
            if($formCategory->isSubmitted()){
            //hydrater mon entity (qui pour le moment est vide) avec les infos de mon formulaire
            $category = $formCategory->getData();
            //je récupère le manager pour pouvoir sauvegarder mon entity dans la base de données
            $manager = $this->getDoctrine()->getManager();
            //je demande a Doctrine de préparer la sauvegarde de mon entity job
            $manager->persist($category);
            //j'exécute la sauvegarde de mon entity job
            $manager->flush();
            //je redirige vers la route de mon choix (dans ce cas, c'est la route qui a le nom 'home'
            return $this->redirectToRoute('daschboard');
            }


        $skill = new Skill();
        //un créé un nouveau formulaire basé sur une entity (dans ce cas, c'est un job)
        $formSkill = $this->createForm('App\Form\InsertionSkillType',$skill);
        //on dit au formulaire d'écouter les envois de request
        $formSkill->handleRequest($request);
            
    
            //si le formulaire est envoyé, alors faire le code dans le if
            if($formSkill->isSubmitted()){
                //hydrater mon entity (qui pour le moment est vide) avec les infos de mon formulaire
                $skill = $formSkill->getData();
                //je récupère le manager pour pouvoir sauvegarder mon entity dans la base de données
                $manager = $this->getDoctrine()->getManager();
                //je demande a Doctrine de préparer la sauvegarde de mon entity job
                $manager->persist($skill);
                //j'exécute la sauvegarde de mon entity job
                $manager->flush();
                //je redirige vers la route de mon choix (dans ce cas, c'est la route qui a le nom 'home'
                return $this->redirectToRoute('daschboard');
            }
    
            
        
        $techno = new Techno();
        //un créé un nouveau formulaire basé sur une entity (dans ce cas, c'est un job)
        $formTechno = $this->createForm('App\Form\InsertionTechnoType',$techno);
        //on dit au formulaire d'écouter les envois de request
        $formTechno->handleRequest($request);
            
    
            //si le formulaire est envoyé, alors faire le code dans le if
            if($formTechno->isSubmitted()){
                //hydrater mon entity (qui pour le moment est vide) avec les infos de mon formulaire
                $techno = $formTechno->getData();
                //je récupère le manager pour pouvoir sauvegarder mon entity dans la base de données
                $manager = $this->getDoctrine()->getManager();
                //je demande a Doctrine de préparer la sauvegarde de mon entity job
                $manager->persist($techno);
                //j'exécute la sauvegarde de mon entity job
                $manager->flush();
                //je redirige vers la route de mon choix (dans ce cas, c'est la route qui a le nom 'home'
                return $this->redirectToRoute('daschboard');
            }
    
        $project = new Project();
        //un créé un nouveau formulaire basé sur une entity (dans ce cas, c'est un job)
        $formProject = $this->createForm('App\Form\InsertionProjectType',$project);
        //on dit au formulaire d'écouter les envois de request
        $formProject->handleRequest($request);
                
        
            //si le formulaire est envoyé, alors faire le code dans le if
            if($formProject->isSubmitted()){
                //hydrater mon entity (qui pour le moment est vide) avec les infos de mon formulaire
                $project = $formProject->getData();
                //je récupère le manager pour pouvoir sauvegarder mon entity dans la base de données
                $manager = $this->getDoctrine()->getManager();
                //je demande a Doctrine de préparer la sauvegarde de mon entity job
                $manager->persist($project);
                //j'exécute la sauvegarde de mon entity job
                $manager->flush();
                //je redirige vers la route de mon choix (dans ce cas, c'est la route qui a le nom 'home'
                return $this->redirectToRoute('daschboard');
            }


            return $this->render("daschboard.html.twig", ["categories" => $categories, "skills" => $skills, "technos" => $technos, "projects" => $projects, "categoryForm" => $formCategory->createView(), 
             "skillForm" => $formSkill->createView(),  "technoForm" => $formTechno->createView(),
             "projectForm" => $formProject->createView()]);

            
    }






    
}