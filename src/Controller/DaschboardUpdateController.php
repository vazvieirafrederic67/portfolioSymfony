<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use App\Repository\TechnoRepository;
use App\Repository\SkillRepository;
use App\Repository\CategoryRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;






class DaschboardUpdateController extends AbstractController
{

    public function index(Request $request,$name, $id, SkillRepository $skillRepository,CategoryRepository $categoryRepository, ProjectRepository $projectRepository, TechnoRepository $technoRepository){

        $form = null;
        $manager = $this->getDoctrine()->getManager();
        switch ($name) {
            case 'skill':
                $skill = $skillRepository->find($id);
                $form = $this->createForm('App\Form\InsertionSkillType',$skill);
                $form->handleRequest($request);
                if($form->isSubmitted()) {
                    $skill = $form->getData();
                    $manager->persist($skill);
                    $manager->flush();
                    return $this->redirectToRoute('daschboard');
                }
                break;

            case 'category':
                $category = $categoryRepository->find($id);
                $form = $this->createForm('App\Form\InsertionCategoryType',$category);
                $form->handleRequest($request);
                if($form->isSubmitted()) {
                    $category = $form->getData();
                    $manager->persist($category);
                    $manager->flush();
                    return $this->redirectToRoute('daschboard');
                }
                break;

            case 'project':
                $project = $projectRepository->find($id);
                $form = $this->createForm('App\Form\InsertionProjectType',$project);
                $form->handleRequest($request);
                if($form->isSubmitted()) {
                    $project = $form->getData();
                    $manager->persist($project);
                    $manager->flush();
                    return $this->redirectToRoute('daschboard');
                }
                break;

            case 'techno':
                $techno = $technoRepository->find($id);
                $form = $this->createForm('App\Form\InsertionTechnoType',$techno);
                $form->handleRequest($request);
                if($form->isSubmitted()) {
                    $techno = $form->getData();
                    $manager->persist($techno);
                    $manager->flush();
                    return $this->redirectToRoute('daschboard');
                }
                break;
        }
        return $this->render('daschboard_update/index.html.twig',["id"=>$id, "name" =>$name ,"form"=>$form->createView()]);

    }

}
