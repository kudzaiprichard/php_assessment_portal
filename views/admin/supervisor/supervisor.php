<?php 
session_start();
if(!isset($_SESSION["email_address"])) {
    header("Location: ../../auth/signup.php");
    exit();
}
require_once("../../../controllers/adminController.php");
// require_once("../../controllers/studentController.php");
define('ROOT',$_SERVER['DOCUMENT_ROOT']."/assessment_portal/views/");
include(ROOT."includes/header.inc.php");
// include(ROOT."includes/side-bar.inc.php");

$adminController = new AdminController();
$supervisors = $adminController->fetchAllSupervisors();
?>

<!-- ======== sidebar-nav start =========== -->
<aside class="sidebar-nav-wrapper">
<div class="navbar-logo " >
    <a href="#">
        <img src="../../../assets/images/logo.jpg" alt="" class="img-fluid " width="120px;">
        <h4><small>ASSESSMENT PORTAL</small></h4>
    </a>
</div>
<nav class="sidebar-nav">
    <ul>
        <li class="nav-item nav-item-has-children">
            <a
                href="#0"
                data-bs-toggle="collapse"
                data-bs-target="#ddmenu_1"
                aria-controls="ddmenu_1"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="icon">
                <svg width="22" height="22" viewBox="0 0 22 22">
                    <path
                    d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z"
                    />
                </svg>
                </span>
                <span class="text">Dashboard</span>
            </a>
            <ul id="ddmenu_1" class="collapse show dropdown-nav">
                <li>
                    <a href="../dashboard/dashboard.php">Dashboard </a>
                </li>
                <li>
                    <a href="../profile/profile.php">Profile</a>
                </li>
            </ul>
        </li>
        <li class="nav-item nav-item-has-children">
            <a
                href="#0"
                data-bs-toggle="collapse"
                data-bs-target="#ddmenu"
                aria-controls="ddmenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="icon">
                <svg width="22" height="22" viewBox="0 0 22 22">
                    <path
                    d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z"
                    />
                </svg>
                </span>
                <span class="text">Manage Student</span>
            </a>
            <ul id="ddmenu" class="collapse show dropdown-nav">
                <li>
                    <a href="supervisor.php" class="active">Supervisor</a>
                </li>
                <li>
                    <a href="../assessor/assessor.php" >Assessors</a>
                </li>
                <li>
                    <a href="../students/students.php">Students </a>
                </li>
            </ul>
        </li> 
    </ul>
</nav>
</aside>
<div class="overlay"></div>
<!-- ======== end sidebar =========== -->

<!-- ======== main-wrapper start =========== -->
<main class="main-wrapper">
<!-- ========== nav start ========== -->
<?php include(ROOT."includes/navbar.inc.php");?>
    <!-- ========== nav end ========== -->
    <!-- ========== section start ========== -->
    <section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
            <div class="title mb-30">
                <h2>Supervisors</h2>
            </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
            <div class="breadcrumb-wrapper mb-30">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="#0">Admin</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                    supervisors
                    </li>
                </ol>
                </nav>
            </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        </div>
        
        <div class="row">
        <!-- End Col -->
        <div class="col">
            <div class="card-style mb-30">
            <div
                class="
                title
                d-flex
                flex-wrap
                justify-content-between
                align-items-center
                "
            >
                <div class="left">
                <h6 class="text-medium mb-30">Supervisor</h6>
                </div>
                <div class="right">
                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">Add Supervisor</a>
                <!-- end select -->
                </div>
            </div>
            <!-- End Title -->
            <!-- End Title -->
            <div class="table-wrapper table-responsive">
                <p class="text-sm mb-20">
                    Add,update,delete supervisor in system.
                </p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h6>First Name</h6>
                            </th>
                            <th>
                                <h6>Last Name</h6>
                            </th>
                            <th>
                                <h6>Position</h6>
                            </th>
                            <th>
                                <h6>Company</h6>
                            </th>
                            <th>
                                <h6>Email Address</h6>
                            </th> 
                            <th>
                                <h6>EC Number</h6>
                            </th>
                            <th>
                                <h6>Mobile Number</h6>
                            </th>
                            <th>
                                <h6>Action</h6>
                            </th>
                        </tr>
                        <!-- end table row-->
                    </thead>
                    <tbody>
                        <?php
                            foreach ($supervisors as $supervisor){
                                echo '
                                <tr>
                                <td>
                                    <a href=""><p>'.$supervisor->getFirstName().'</p></a>
                                </td>
                                <td class="min-width">
                                    <a href=""><p>'.$supervisor->getLastName().'</p></a>
                                </td>
                                <td class="min-width">
                                    <a href=""><p>'.$supervisor->getPosition().'</p></a>
                                </td>
                                <td class="min-width">
                                    <a href="">
                                    <p>'.$supervisor->getCompanyName().'</p>
                                    </a>
                                </td>
                                <td class="min-width">
                                    <a href=""><p>'.$supervisor->getEmailAddress().'</p></a>
                                </td>
                                <td class="min-width">
                                    <a href=""><p>'.$supervisor->getEcNumber().'</p></a>
                                </td>
                                <td class="min-width">
                                    <a href=""><p>'.$supervisor->getPhoneNumber().'</p></a>
                                </td>
                                <td>
                                    <div class="action justify-content-end">
                                        <button class="more-btn ml-10 dropdown-toggle" id="moreAction1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="lni lni-more-alt"></i>
                                    </button>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction1">
                                            <li class="dropdown-item">
                                                <a href="delete-user.php?id='.$supervisor->getEmailAddress().'" class="text-gray">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
                <!-- end table -->
            </div>

            </div>
        </div>
        <!-- End Col -->
        </div>
        <!-- End Row -->
    </section>
    <!-- ========== section end ========== -->
<!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalTitleId">Add A User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3 needs-validation" action="save-supervisor.php" novalidate>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" name="first_name" class="form-control" id="validationCustom01" value="Mark" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" name="last_name" class="form-control" id="validationCustom02" value="Otto" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Position</label>
                <div class="input-group">
                <input type="text" name="position" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a Position.
                </div>
                </div>
            </div>
            <div class="col-6">
                <label for="validationCustom03" class="form-label">Company Name</label>
                <input type="text" name="company_name" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                Please provide a valid Program.
                </div>
            </div>
            <div class="col-6">
                <label for="validationCustom03" class="form-label">Email Address</label>
                <input type="email" name="email_address" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                Please provide a valid Email Address.
                </div>
            </div>
            <div class="col">
                <label for="validationCustom05" class="form-label">Mobile Number</label>
                <input type="text" name="phone_number" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                Please provide a valid Mobile Number.
                </div>
            </div>
            <div class="col">
                <label for="validationCustom05" class="form-label">EC Number</label>
                <input type="text" name="ec_number" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                Please provide a valid EC Number.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Account Type</label>
                <select class="form-select" id="validationCustom04" name="account_type" required >
                    <option selected value="supervisor">Supervisor</option>
                </select>
                <div class="invalid-feedback">
                Please select a valid type.
                </div>
            </div>                         
        </div>
        <div class="modal-footer mt-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit" value="create_user" name="create_user">Save Supervisor</button>
        </div>
        </form>
        </div>
    </div>
    </div>
    
    
    <!-- Optional: Place to the bottom of scripts -->
    <script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
    
    </script>
    <!-- End Table -->
<!-- ========== footer start =========== -->
<?php include(ROOT."includes/footer.inc.php");?>
<!-- ========== footer end =========== -->
