<?php while ($row = mysqli_fetch_array($tasks)) { ?>
        <div class="col-12 animate__animated animate__fadeInDown">
            <div class="card task-card border-danger shadow-sm">
                <div class="card-body">
                    <div class="card-text p-2 float-start">
                        <h4 class="fw-semibold"><?php echo $row['task']; ?></h4>
                        <p class="fw-light">Member</p>
                        <img src="assets/img/Bocci.png" alt="Profile Picture" class="img-fluid border border-dark border-opacity-25 rounded-circle" width="40">
                    </div>
                    <div class="card-button float-end">
                        <!-- Delete button -->
                        <a href="todo.php?del_task=<?php echo $row['id'] ?>" type="button" class="d-none delete btn close-btn m-2 p-0" aria-label="Close"><i class="bi bi-trash3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    <?php }; ?>