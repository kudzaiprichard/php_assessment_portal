<?php
require_once('Connection.php');
define('RA',$_SERVER['DOCUMENT_ROOT']."/assessment_portal/services/");
require_once(RA."userServices.php");
require_once(RA."studentsServices.php");
require_once(RA."assessorServices.php");
require_once(RA."supervisorServices.php");

class AdminController{
    private $userServices;
    private $studentServices;
    private $assessorServices;
    private $supervisorServices;

    function __construct() {
        $this->userServices = new UserServices();
        $this->studentServices = new StudentsServices();
        $this->assessorServices = new AssessorService();
        $this->supervisorServices = new supervisorService();
    } 

    function fetchAllUsers()
    {
        return $this->userServices->fetchAllUsers();
    } 
    
    function fetchAllStudents()
    {
        return $this->studentServices->fetchAllStudents();
    }
    

    function fetchAllSupervisors()
    {
        return $this->supervisorServices->fetchAllSupervisors();
    }

    function fetchAllAssessors()
    {
        return $this->assessorServices->fetchAllAssessors();
    }

    function deleteUser($emailAddress)
    {
        $user = $this->userServices->getLoggedInUser($emailAddress);
        if($user->getEmailAddress == $emailAddress){return 0;}
        return $this->userServices->deleteUser($emailAddress);
    } 

    function addStudent($firstName, $lastName, $regNumber, $program, $phoneNumber, $emailAddress, $physicalAddress, $assessor_id, $supervisor_id )
    {
        return $this->studentServices->createStudent($firstName, $lastName, $regNumber, $program, $phoneNumber, $emailAddress, $physicalAddress, $assessor_id, $supervisor_id );
    }
    
    function addSupervisor($firstName, $lastName, $position, $companyName, $phoneNumber, $ecNumber, $emailAddress)
    {
        return $this->supervisorServices->saveSupervisor($firstName, $lastName, $position, $companyName, $phoneNumber, $ecNumber, $emailAddress);
    }

    function addAssessor($firstName, $lastName, $regNumber, $program, $phoneNumber, $emailAddress, $physicalAddress)
    {
        return $this->assessorServices->saveAssessor($firstName, $lastName, $regNumber, $program, $phoneNumber, $emailAddress, $physicalAddress);
    }

    function saveAsUser($isAdmin,$password=null,$emailAddress=null,$accountType=null)
    {
        return $this->studentServices->saveUser($isAdmin,$password,$emailAddress,$accountType);
    }

    function login($emailAddress,$password)
    {
        return $this->userServices->login($emailAddress, $password);
    }

    function logout()
    {
        return $this->userServices->logout();
    }

    function getLoggedInUser($emailAddress)
    {
        $userServices = new UserServices();
        return $userServices->getLoggedInUser($emailAddress);
    }

    function getLoggedInUser2($emailAddress)
    {
        $userServices = new UserServices();
        return $userServices->getLoggedInUser($emailAddress);
    }

    function updateUser($id,$emailAddress, $password){
        return $this->userServices->updateUser($id,$emailAddress, $password);
    }

}

?>