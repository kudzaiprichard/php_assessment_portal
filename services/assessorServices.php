<?php
// require('Connection.php');
define('A',$_SERVER['DOCUMENT_ROOT']."/assessment_portal/models/");
include(A."UserBaseClass.php");
include(A."Assessor.php");

class AssessorService{
    private $db;
    function __construct() { $this->db = new Connection("localhost", "root", "", "portal");}

    function saveAssessor($firstName, $lastName, $regNumber, $program, $phoneNumber, $emailAddress, $physicalAddress) {
        $isCreated = false;
        $query = "INSERT into `student` (first_name, last_name, reg_number, program, phone_number, email_address, physical_address) 
                                    VALUES ('$firstName', '$lastName', '$regNumber', '$program', 
                                            '$phoneNumber', '$emailAddress',  '$physicalAddress')";
        $con = $this->db->openConnection();
        if (mysqli_query($con, $query)) {
            $isCreated = True;
        } else {
            $isCreated = False;
        } 
        $con->close();

    return $isCreated;
    }
    
    function fetchAllAssessors() {
        $assessors = array();
        $con = $this->db->openConnection();
        
        $query = "SELECT * FROM `assesor`";
        $result = mysqli_query($con, $query);

        while($row = $result->fetch_assoc()) {
            $assessor = new Assessor($row['id'],$row['first_name'],$row['last_name'],$row['reg_number'],$row['program'],$row['phone_number'],$row['email_address'],$row['physical_address']);
            array_push($assessors, $assessor);
            unset($assessor);
        }

        $con->close(); 
        return $assessors;
    }

    #TODO: 
    function updateAssessorByEmail($id) {}

    function deleteAssessorById($emailAddress) {
        $con = $this->db->openConnection();
        $query3 = "DELETE FROM assesor WHERE email_address='$emailAddress'";
        $result3 = $con->query($query3);
        $con->close();
    }

    function getAssessorByEmail($emailAddress) {
        $Assessors = array();
        $con = $this->db->openConnection();
        $query = "SELECT * FROM `assesor` WHERE `email_address` = '$emailAddress'";

        $result = mysqli_query($con, $query);

        while($row = $result->fetch_assoc()) {
            $Assessor = new Assessor($row['id'],$row['first_name'],$row['last_name'],$row['reg_number'],$row['program'],$row['phone_number'],$row['email_address'],$row['physical_address']);
            array_push($Assessors, $Assessor);
            unset($Assessor);
        }

        $con->close(); 
        return $Assessors[0];
    }
}

?>