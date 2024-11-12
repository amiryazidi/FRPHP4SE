<?php

namespace App\Controller;

use App\Entity\Student;
use App\Repository\ClassroomRepository;
use App\Repository\StudentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    #[Route('/listStudents', name: 'listStudents')]
    public function listStudents(StudentRepository $repo) {
      // recuperer les donners de la base de donnees
        $students = $repo->findAll();
        // envoyer ces donnes a la vue
        return $this->render('student/list.html.twig', [
            'students' => $students,
        ]);
    }  
    #[Route('/AddSt', name: 'AddSt')]
    public function AddStudent(ManagerRegistry $mr, ClassroomRepository $repo) {
        $c=$repo->find(1);
        // 1 - creer instace 
        $student = new Student();
        // 2 - remplir les champs
        $student->setUserName('amir');
        $student->setAge(25);
        $student->setEmail('ali@gmail.com');
        $student->setClassroom($c);
        // 3 - sauvgarder dans la base de donnees
        $em = $mr->getManager();
        $em->persist($student);
        $em->flush();
        return $this->redirectToRoute('listStudents');
    }
    #[Route('/deleteST/{id}', name: 'deleteST')]
    public function DeleteSTudent(ManagerRegistry $mr, $id,StudentRepository $repo) {
       $student = $repo->find($id);   
         $em = $mr->getManager();
        $em->remove($student);
        $em->flush();
        return $this->redirectToRoute('listStudents');
    } 

    #[Route('/updateST/{id}', name: 'updateST')]
    public function UpdateSTudnet(ManagerRegistry $mr, $id,StudentRepository $repo) {
       $student = $repo->find($id);   
       $student->setUserName('updateted');
       $student->setAge(25);
        $em = $mr->getManager();
        $em->persist($student);
        $em->flush();
        return $this->redirectToRoute('listStudents');
    } 
}
