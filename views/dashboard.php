<?php 
    include '../classes/User.php';
    $user = new User();
    session_start();

    // print_r($_SESSION); 


    $all_users = $user->getAllUsers();


?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
<?php include 'nav.php' ?>
    <div class="row justify-content-center mt-5">
        <div class="col-6">
            <table class="table">
                <thead class="table-dark">
            
                    <td></td>
                    <td>ID</td>
                    <td>First name</td>
                    <td>Last name</td>
                    <td>Username</td>
                    <td></td>
                    
                </thead>
                <tbody>
                    <?php foreach($all_users as $user): ?>
                        <tr>
                            <td></td>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['first_name'] ?></td>
                            <td><?= $user['last_name'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td>
                                <!-- 自分の箇所（ログインした）　だけ編集ボタンが出てくる⇩ -->
                              <?php if($user['id'] == $_SESSION['user_id']): ?>
                                <a href="edit.php" class="btn btn-warning">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <a href="delete.php" class="btn btn-danger">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                                

                              <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>