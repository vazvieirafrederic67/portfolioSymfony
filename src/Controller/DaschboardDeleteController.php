<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProjectRepository;
use App\Repository\SkillRepository;
use App\Repository\TechnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DaschboardDeleteController extends AbstractController
{
    
    

       public function index(Request $request,$name, $id, SkillRepository $skillRepository,CategoryRepository $categoryRepository, ProjectRepository $projectRepository, TechnoRepository $technoRepository){

        $manager = $this->getDoctrine()->getManager();

        switch ($name) {
            case 'skill':
                $skill = $skillRepository->find($id);
                $manager->remove($skill);
                $manager->flush();
                return $this->redirectToRoute('daschboard');
                break;

            case 'category':
                $category = $categoryRepository->find($id);
                $manager->remove($category);
                $manager->flush();
                return $this->redirectToRoute('daschboard');
                break;

            case 'project':
                $project = $projectRepository->find($id);
                $manager->remove($project);
                $manager->flush();
                return $this->redirectToRoute('daschboard');
                break;

            case 'techno':
                $techno = $technoRepository->find($id);
                $manager->remove($techno);
                $manager->flush();
                return $this->redirectToRoute('daschboard');
                break;
        }
        return $this->render('daschboard_update/index.html.twig');

    }













    
}
