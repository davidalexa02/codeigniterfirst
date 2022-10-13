<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Codeigniter</title>
</head>


<body>

    <div class="container bg-dark py-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card" style="margin-top: 30px">
                    <div class="card-header text-center">
                        Editeaza user
                    </div>
                    <div class="card-body">
                        <form method="post" autocomplete="off" action="<?php echo base_url('users/update/' . $blog->id);?>">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nume</label>
                                <input type="text" placeholder="User Name" name="username" class="form-control" id="name" aria-describedby="name" value="<?php echo $blog->username; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Adresa de email</label>
                                <input type="email" placeholder="Email Address" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $blog->email; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Parola</label>
                                <input type="password" name="password" placeholder="User Password" class="form-control" id="exampleInputPassword1" value="">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Confirma schimbarile</button>
                            </div>

                            <?php
                            if ($this->session->flashdata('success')) {    ?>
                                <p class="text-success text-center" style="margin-top: 10px;"> <?= $this->session->flashdata('success') ?></p>
                            <?php } ?>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>