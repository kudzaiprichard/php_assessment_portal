
<?php 
session_start();
if(!isset($_SESSION["email_address"])) {
    header("Location: ../../auth/signup.php");
    exit();
}
require_once("../../../controllers/supervisorController.php");
define('ROOT',$_SERVER['DOCUMENT_ROOT']."/assessment_portal/views/");
include(ROOT."includes/header.inc.php");

$supervisorController = new SupervisorController();
$supervisor = $supervisorController->getLoggedInUser($_SESSION["email_address"]);
$supervisorSuper = $supervisorController->getLoggedInUser2($_SESSION["email_address"]);
$_SESSION["supervisor_id"] = $supervisor->getId();
$_SESSION["user_id"] = $supervisorSuper->getId();

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
                    <a href="profile.php" class="active">Profile</a>
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
                <span class="text">Students</span>
            </a>
            <ul id="ddmenu" class="collapse show dropdown-nav">
                <li>
                    <a href="../assessments/assessment-form.php">Assessment Forms</a>
                </li>
                <li>
                    <a href="../reports/reports.php">Reports </a>
                </li>
                <li>
                    <a href="../tasks/tasks.php">Tasks </a>
                </li>
            </ul>
        </li> 
        <li class="nav-item">
        <a href="../messages/messages.php">
            <span class="icon">
            <svg
                width="22"
                height="22"
                viewBox="0 0 22 22"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                d="M9.16667 19.25H12.8333C12.8333 20.2584 12.0083 21.0834 11 21.0834C9.99167 21.0834 9.16667 20.2584 9.16667 19.25ZM19.25 17.4167V18.3334H2.75V17.4167L4.58333 15.5834V10.0834C4.58333 7.24171 6.41667 4.76671 9.16667 3.94171V3.66671C9.16667 2.65837 9.99167 1.83337 11 1.83337C12.0083 1.83337 12.8333 2.65837 12.8333 3.66671V3.94171C15.5833 4.76671 17.4167 7.24171 17.4167 10.0834V15.5834L19.25 17.4167ZM15.5833 10.0834C15.5833 7.51671 13.5667 5.50004 11 5.50004C8.43333 5.50004 6.41667 7.51671 6.41667 10.0834V16.5H15.5833V10.0834Z"
                />
            </svg>
            </span>
            <span class="text">Messages</span>
        </a>
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
                <h2>User Details</h2>
            </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
            <div class="breadcrumb-wrapper mb-30">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="#0">Profile</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                    Supervisor
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
        <div class="col-lg-6">
            <div class="card-style settings-card-1 mb-30">
                <div
                    class="
                    title
                    mb-30
                    d-flex
                    justify-content-between
                    align-items-center
                    "
                >
                    <h6>My Profile</h6>
                    <button class="border-0 bg-transparent">
                    <i class="lni lni-pencil-alt"></i>
                    </button>
                </div>
                <div class="profile-info">
                    <div class="input-style-1">
                        <label>First Name</label>
                        <?php echo '<input type="text" value="'.$supervisor->getFirstName().'" disabled/>'?>
                    </div>
                    <div class="input-style-1">
                        <label>Last Name</label>
                        <?php echo '<input type="text" value="'.$supervisor->getLastName().'" disabled/>'?>
                    </div>

                    <div class="input-style-1">
                        <label>Email</label>
                        <?php echo'<input type="email" placeholder="'.$supervisor->getEmailAddress().'" value="'.$supervisor->getEmailAddress().'" disabled/>';?>
                    </div>
                    <div class="input-style-1">
                        <label>Password</label>
                        <?php echo '<input type="password" value="'.$supervisorSuper->getPassword().'" disabled/>'?>
                    </div>
                
                    <div class="input-style-1">
                        <label>Company Name</label>
                        <?php echo '<input type="text" value="'.$supervisor->getCompanyName().'" disabled/>'?>
                    </div>
                    <div class="input-style-1">
                        <label>Position</label>
                        <?php echo '<input type="text" value="'.$supervisor->getPosition().'" disabled/>'?>
                    </div>
                    <div class="input-style-1">
                        <label>Mobile Number</label>
                        <?php echo '<input type="text" value="'.$supervisor->getPhoneNumber().'" disabled/>'?>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-lg-6">
            <div class="card-style settings-card-2 mb-30">
            <div class="title mb-30">
                <h6>My Profile</h6>
            </div>
            <form action="update-profile.php">
                <div class="row">
                <div class="col-12">
                    <div class="input-style-1">
                    <label>First Name</label>
                    <?php echo '<input type="text" name="first_name" value="'.$supervisor->getFirstName().'"/>';?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-style-1">
                    <label>Last Name</label>
                    <?php echo'<input type="text" name="last_name" value="'.$supervisor->getLastName().'"/>';?>
                    </div>
                </div>

                <div class="col-12">
                    <div class="input-style-1">
                    <label>Email Address</label>
                    <?php echo '<input type="email" name="email_address" value="'.$supervisor->getEmailAddress().'"/>';?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-style-1">
                    <label>Password</label>
                    <?php echo '<input type="password" name="password" value="'.$supervisorSuper->getPassword().'"/>';?>
                    </div>
                </div>

                <div class="col-12">
                    <div class="input-style-1">
                    <label>Company Name</label>
                    <?php echo '<input type="text" name="company_name" value="'.$supervisor->getCompanyName().'"/>';?>
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="input-style-1">
                    <label>Position</label>
                    <?php echo'<input type="text" name="position" value="'.$supervisor->getPosition().'"/>';?>
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="input-style-1">
                    <label>Mobile Number</label>
                    <?php echo'<input type="text" name="mobile_number" value="'.$supervisor->getPhoneNumber().'"/>';?>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" name="submit" class="main-btn primary-btn btn-hover">
                    Update Profile
                    </button>
                </div>
                </div>
            </form>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        </div>
    </section>
    <!-- ========== section end ========== -->

<!-- ========== footer start =========== -->
<?php include(ROOT."includes/footer.inc.php");?>
<!-- ========== footer end =========== -->

