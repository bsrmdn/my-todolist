<?php
$con = mysqli_connect('localhost', 'root', '', 'todo');

// If the input blank
$error = "";
if (isset($_GET['addTask'])) {
    $task = $_GET['task'];
    if (empty($task)) {
        $errors = "You must name the task";
    } else {
        mysqli_query($con, "INSERT INTO tasks (task) VALUES ('$task')");
        header('location: todo.php');
    }
}


// Delete task
if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];
    mysqli_query($con, "DELETE FROM tasks WHERE id=$id");
    header('location: todo.php');
}


// Get data from database
$tasks = mysqli_query($con, "SELECT * FROM tasks");

// Get length of the task
$length =  mysqli_affected_rows($con);



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Momon | Manage your task today</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/todo.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- My Js -->
    <script src="assets/js/script.js"></script>
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>

<body class="bg-primary bg-opacity-10 overflow-scroll">

    <!-- Profile -->
    <header>
        <div class="container animate__animated animate__fadeInDown">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar">
                        <div class="container-fluid">
                            <a class="navbar-brand">
                                <span class="fw-semibold">Bocci</span> <br>
                                <span class="fw-light text-success"><?php echo $length; ?> Task Pending</span>
                            </a>
                            <img src="assets/img/Bocci.png" alt="Profile Picture" class="img-fluid border border-dark border-opacity-25 rounded-circle" width="70">
                        </div>
                    </nav>
                </div>
                <div class="col-12"><?php if (isset($errors)) { ?>
                        <p class="text-danger"><?php echo $errors; ?></p>
                    <?php } ?></div>
            </div>
        </div>
    </header>
    <!-- Profile\ -->

    <!-- Menu -->
    <section id="menu">
        <div class="container px-4 pb-3 pt-5">
            <div class="row justify-content-center g-4">
                <div onclick="showElement('formAdd')" class="col-auto animate__animated animate__fadeInLeft">
                    <div class="card card-category border-0 category-female shadow-sm">
                        <div class="card-body">
                            <div class="card-text p-2">
                                <h4 class="fw-semibold">Add your Task</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div onclick="showElement('delete')" class="col-auto animate__animated animate__fadeInLeft">
                    <div class="card card-category border-0 category-male shadow-sm ">
                        <div class="card-body">
                            <div class="card-text p-2">
                                <h4 class="fw-semibold">Remove Task</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Menu\ -->

    <!-- Form Add Todo -->
    <section id="formAdd" class="invisible animate__animated">
        <div class="container py-3 py-md-4">
            <!-- Form -->
            <form method="GET" class="d-flex justify-content-center pe-auto container-fluid" role="search">
                <!-- Text input -->
                <input name="task" class="form-control border-0 ms-5 me-2 px-4 rounded-pill shadow-sm" type="text" placeholder="Add your task">
                <!-- Sumbit -->
                <button name="addTask" class="btn btn-success rounded-circle shadow" type="submit"><i class="bi bi-plus-lg "></i></button>
            </form>
        </div>
    </section>
    <!-- Form Add Todo\ -->

    <!-- List Todo -->
    <section id="TodoList">
        <div class="container px-4 py-3">
            <div class="row g-3">
                <div class="col-12 text-center animate__animated animate__fadeInDown">
                    <h3 class="fw-bold">To do list</h3>
                    <!-- Show Delete Button -->
                    
                </div>

                <!-- Task -->
                <div id="taskList" class="d-block animate__animated row g-2">
                <?php while ($row = mysqli_fetch_array($tasks)) { ?>
                    <div class="col-12 animate__animated animate__fadeInDown">
                        <div class="animate__animated animate__fadeInDown card task-card border-danger shadow-sm">
                            <div class="card-body">
                                <div class="card-text p-2 float-start">
                                    <h4 class="fw-semibold"><?php echo $row['task']; ?></h4>
                                    <p class="fw-light">Member</p>
                                    <img src="assets/img/Bocci.png" alt="Profile Picture" class="img-fluid border border-dark border-opacity-25 rounded-circle" width="40">
                                </div>
                                <div class="card-button float-end">
                                    <!-- Delete button -->
                                    <a href="todo.php?del_task=<?php echo $row['id'] ?>" type="button" class="d-none animate__animated animate__fadeInDown delete btn close-btn m-2 p-0" aria-label="Close"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }; ?>
            </div>
            <div class="col-12 text-center animate__animated animate__fadeInDown">
                <a id="showTaskBtn" class="btn border-0 text-danger" onclick="showElement('taskList'); toggleInnerHTML('showTaskBtn')">Hide Task</a>
            </div>
                <!-- Task\ -->
            </div>
        </div>
    </section>
    <!-- List Todo\ -->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>