<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");
}
else {
    // Makes it easier to read
        $id = $_SESSION['id'];

    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $address = $_SESSION['address'];
    $phone = $_SESSION['phone'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Welcome <?= $first_name.' '.$last_name?></title>
    <style type="text/css">
    body {
        margin-top: 20px;
        background: #f7f8fa
    }

    .avatar-xxl {
        height: 7rem;
        width: 7rem;
    }

    .card {
        margin-bottom: 20px;
        -webkit-box-shadow: 0 2px 3px #eaedf2;
        box-shadow: 0 2px 3px #eaedf2;
    }

    .pb-0 {
        padding-bottom: 0 !important;
    }

    .font-size-16 {
        font-size: 16px !important;
    }

    .avatar-title {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        background-color: #038edc;
        color: #fff;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        font-weight: 500;
        height: 100%;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        width: 100%;
    }

    .bg-soft-primary {
        background-color: rgba(3, 142, 220, .15) !important;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .nav-tabs-custom .nav-item .nav-link.active {
        color: #038edc;
    }

    .nav-tabs-custom .nav-item .nav-link {
        border: none;
    }

    .nav-tabs-custom .nav-item .nav-link.active {
        color: #038edc;
    }

    .avatar-group {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        padding-left: 12px;
    }

    .border-end {
        border-right: 1px solid #eff0f2 !important;
    }

    .d-inline-block {
        display: inline-block !important;
    }

    .badge-soft-danger {
        color: #f34e4e;
        background-color: rgba(243, 78, 78, .1);
    }

    .badge-soft-warning {
        color: #f7cc53;
        background-color: rgba(247, 204, 83, .1);
    }

    .badge-soft-success {
        color: #51d28c;
        background-color: rgba(81, 210, 140, .1);
    }

    .avatar-group .avatar-group-item {
        margin-left: -14px;
        border: 2px solid #fff;
        border-radius: 50%;
        -webkit-transition: all .2s;
        transition: all .2s;
    }

    .avatar-sm {
        height: 2rem;
        width: 2rem;
    }

    .nav-tabs-custom .nav-item {
        position: relative;
        color: #343a40;
    }

    .nav-tabs-custom .nav-item .nav-link.active:after {
        -webkit-transform: scale(1);
        transform: scale(1);
    }

    .nav-tabs-custom .nav-item .nav-link::after {
        content: "";
        background: #038edc;
        height: 2px;
        position: absolute;
        width: 100%;
        left: 0;
        bottom: -2px;
        -webkit-transition: all 250ms ease 0s;
        transition: all 250ms ease 0s;
        -webkit-transform: scale(0);
        transform: scale(0);
    }

    .badge-soft-secondary {
        color: #74788d;
        background-color: rgba(116, 120, 141, .1);
    }

    .badge-soft-secondary {
        color: #74788d;
    }

    .work-activity {
        position: relative;
        color: #74788d;
        padding-left: 5.5rem
    }

    .work-activity::before {
        content: "";
        position: absolute;
        height: 100%;
        top: 0;
        left: 66px;
        border-left: 1px solid rgba(3, 142, 220, .25)
    }

    .work-activity .work-item {
        position: relative;
        border-bottom: 2px dashed #eff0f2;
        margin-bottom: 14px
    }

    .work-activity .work-item:last-of-type {
        padding-bottom: 0;
        margin-bottom: 0;
        border: none
    }

    .work-activity .work-item::after,
    .work-activity .work-item::before {
        position: absolute;
        display: block
    }

    .work-activity .work-item::before {
        content: attr(data-date);
        left: -157px;
        top: -3px;
        text-align: right;
        font-weight: 500;
        color: #74788d;
        font-size: 12px;
        min-width: 120px
    }

    .work-activity .work-item::after {
        content: "";
        width: 10px;
        height: 10px;
        border-radius: 50%;
        left: -26px;
        top: 3px;
        background-color: #fff;
        border: 2px solid #038edc
    }
    </style>



</head>

<body>
    <!-- <div class="form">

          <h1>Welcome</h1>


          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>
          <p><?= $address.' '.$phone  ?></p>

          <a href="home.php"><button class="button button-block"/>Home</button></a><br>
          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div> -->


    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <div class="text-center border-end">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                        class="img-fluid avatar-xxl rounded-circle" alt="">
                                    <h4 class="text-primary font-size-20 mt-3 mb-2"><?= $first_name.' '.$last_name?>
                                    </h4>
                                    <h5 class="text-muted font-size-13 mb-0">Customer</h5>
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-9">
                                <div class="ms-3">
                                    <div>
                                        <h4 class="card-title mb-2">Biography</h4>
                                        <p class="mb-0 text-muted">Hi I'm Jansh,has been the industry's standard
                                            dummy text To an English person alteration text.</p>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col-md-12">
                                            <div>
                                                <p class="text-muted mb-2 fw-medium"><i
                                                        class="mdi mdi-email-outline me-2"></i><?= $email?>
                                                </p>
                                                <p class="text-muted fw-medium mb-0"><i
                                                        class="mdi mdi-phone-in-talk-outline me-2"></i>418-955-4703
                                                </p>
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->

                                    <ul class="nav nav-tabs nav-tabs-custom border-bottom-0 mt-3 nav-justfied"
                                        role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link px-4 "
                                                href="https://bootdey.com/snippets/view/profile-projects"
                                                target="__blank">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">Projects</span>
                                            </a>
                                        </li><!-- end li -->
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link px-4 active" data-bs-toggle="tab" href="#tasks-tab"
                                                role="tab" aria-selected="false" tabindex="-1">
                                                <span class="d-block d-sm-none"><i class="mdi mdi-menu-open"></i></span>
                                                <span class="d-none d-sm-block">Tasks</span>
                                            </a>
                                        </li><!-- end li -->
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link px-4 "
                                                href="https://bootdey.com/snippets/view/profile-with-team-section"
                                                target="__blank">
                                                <span class="d-block d-sm-none"><i
                                                        class="mdi mdi-account-group-outline"></i></span>
                                                <span class="d-none d-sm-block">Team</span>
                                            </a>
                                        </li><!-- end li -->
                                    </ul><!-- end ul -->
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end card body -->
                </div><!-- end card -->

                <div class="card">

                    <div class="tab-content p-2">


                        <div class="tab-pane active show" id="tasks-tab" role="tabpanel">

                            <div class="row">




                                <div class="col-xl-12">


                                    <div class="task-list-box" id="landing-task">
                                        <div id="task-item-1">
                                            <div class="card task-box rounded-3">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-xl-6 col-sm-5">
                                                            <div class="checklist form-check font-size-15">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="customCheck1">
                                                                <label class="form-check-label ms-1 task-title"
                                                                    for="customCheck1">Create a New
                                                                    Landing</label>
                                                            </div>
                                                        </div><!-- end col -->
                                                        <div class="col-xl-6 col-sm-7">
                                                            <div class="row align-items-center">
                                                                <div class="col-xl-5 col-md-6 col-sm-5">
                                                                    <div class="avatar-group mt-3 mt-xl-0 task-assigne">
                                                                        <div class="avatar-group-item">
                                                                            <a href="javascript: void(0);"
                                                                                class="d-inline-block"
                                                                                data-bs-toggle="tooltip"
                                                                                value="member-2" data-bs-placement="top"
                                                                                aria-label="Mark Powell"
                                                                                data-bs-original-title="Mark Powell">
                                                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                                    alt=""
                                                                                    class="rounded-circle avatar-sm">
                                                                            </a>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <a href="javascript: void(0);"
                                                                                class="d-inline-block"
                                                                                data-bs-toggle="tooltip"
                                                                                value="member-4" data-bs-placement="top"
                                                                                aria-label="Craig Hall"
                                                                                data-bs-original-title="Craig Hall">
                                                                                <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                                                                    alt=""
                                                                                    class="rounded-circle avatar-sm">
                                                                            </a>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <a href="javascript: void(0);"
                                                                                class="d-block" data-bs-toggle="tooltip"
                                                                                value="member-11"
                                                                                data-bs-placement="top"
                                                                                data-bs-original-title="Sarah Kerns">
                                                                                <div class="avatar-sm">
                                                                                    <div
                                                                                        class="avatar-title rounded-circle bg-info">
                                                                                        S
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </div><!-- end avatar group -->
                                                                </div><!-- end col -->
                                                                <div class="col-xl-7 col-md-6 col-sm-7">
                                                                    <div
                                                                        class="d-flex flex-wrap gap-3 mt-3 mt-xl-0 justify-content-md-end">
                                                                        <div>
                                                                            <span
                                                                                class="badge rounded-pill badge-soft-warning font-size-11 task-status">Progress</span>
                                                                        </div>
                                                                        <div>
                                                                            <a href="#"
                                                                                class="mb-0 text-muted fw-medium"><i
                                                                                    class="mdi mdi-checkbox-marked-circle-outline me-1"></i>4/8
                                                                            </a>
                                                                        </div>
                                                                        <div>
                                                                            <a href="#"
                                                                                class="mb-0 text-muted fw-medium"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target=".bs-example-new-task"><i
                                                                                    class="mdi mdi-square-edit-outline font-size-16 align-middle"
                                                                                    onclick="editTask('task-item-1')"></i></a>
                                                                        </div>
                                                                        <div>
                                                                            <a href="#" class="delete-item"
                                                                                onclick="deleteProjects('task-item-1')">
                                                                                <i
                                                                                    class="mdi mdi-trash-can-outline align-middle font-size-16 text-danger"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- end col -->
                                                            </div><!-- end row -->
                                                        </div><!-- end col -->
                                                    </div><!-- end row -->
                                                </div><!-- end cardbody -->
                                            </div><!-- end card -->
                                        </div>
                                    </div><!-- end -->
                                </div><!-- end col -->


                            </div><!-- end row -->
                        </div><!-- end tab pane -->
                    </div>
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-2">
                            <h4 class="card-title mb-3">About</h4>
                            <p>Hi I'm Jansh, has been the industry's standard dummy text To an English
                                person, it will seem like
                                simplified.</p>
                            <ul class="ps-3 mb-0">
                                <li>it will seem like simplified.</li>
                                <li>To achieve this, it would be necessary to have uniform pronunciation</li>
                            </ul>
                            <!-- end ul -->
                        </div>
                        <hr>
                        <div class="pt-2">
                            <h4 class="card-title mb-4">My Skill</h4>
                            <div class="d-flex gap-2 flex-wrap">
                                <span class="badge badge-soft-secondary p-2">HTML</span>
                                <span class="badge badge-soft-secondary p-2">Bootstrap</span>
                                <span class="badge badge-soft-secondary p-2">Scss</span>
                                <span class="badge badge-soft-secondary p-2">Javascript</span>
                                <span class="badge badge-soft-secondary p-2">React</span>
                                <span class="badge badge-soft-secondary p-2">Angular</span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->

                <div class="card">
                    <div class="card-body">
                        <div>
                            <h4 class="card-title mb-4">Personal Details</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td><?= $first_name.' '.$last_name?></td>
                                        </tr><!-- end tr -->
                                        <tr>
                                            <th scope="row">Location</th>
                                            <td>California, United States</td>
                                        </tr><!-- end tr -->
                                        <tr>
                                            <th scope="row">Language</th>
                                            <td>English</td>
                                        </tr><!-- end tr -->
                                        <tr>
                                            <th scope="row">Website</th>
                                            <td>abc12@probic.com</td>
                                        </tr><!-- end tr -->
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->

                <div class="card">
                    <div class="card-body">
                        <div>
                            <h4 class="card-title mb-4">Work Experince</h4>
                            <ul class="list-unstyled work-activity mb-0">
                                <li class="work-item" data-date="2020-21">
                                    <h6 class="lh-base mb-0">ABCD Company</h6>
                                    <p class="font-size-13 mb-2">Web Designer</p>
                                    <p>To achieve this, it would be necessary to have uniform grammar, and more
                                        common words.</p>
                                </li>
                                <li class="work-item" data-date="2019-20">
                                    <h6 class="lh-base mb-0">XYZ Company</h6>
                                    <p class="font-size-13 mb-2">Graphic Designer</p>
                                    <p class="mb-0">It will be as simple as occidental in fact, it will be
                                        Occidental person, it will seem like simplified.</p>
                                </li>
                            </ul><!-- end ul -->
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
    </div>



</body>
</html>