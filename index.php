<?php 
    $host = "localhost";
    $user = "root"; 
    $pass = "";
    $db = "student1";
    $con = mysqli_connect($host, $user, $pass, $db);
    $res = mysqli_query($con, "SELECT * FROM student");

    $sqls = '';
    if (isset($_POST['add'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $sqls = "INSERT INTO student VALUE($id, '$name', '$address')";
        mysqli_query($con, $sqls);
        header("location: index.php");
    }
    
    if (isset($_POST['del'])) {
        $id = $_POST['id'];
        $sqls = "DELETE FROM student WHERE id='$id'";
        mysqli_query($con, $sqls);
        header("location: index.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>School Project</title>
</head>
<body class="bg-light" dir="rtl">
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-6 col-md-12 d-flex">
                <form method="POST" class="border border-dark rounded p-3 w-100 text-center mb-3">
                    <img src="image/fcai-logo.png" alt="لوجو الموقع" class="algin-item-center">
                    <h3 class="text-center">لوحه المدير</h3>
                    <div class="form-group p-2 my-1">
                        <label for="id" >رقم الطالب</label>
                        <input type="text" name="id" id="id" class="form-control text-center mt-2" required>
                    </div>
                    <div class="form-group p-2 my-1">
                        <label for="name">اسم الطالب</label>
                        <input type="text" name="name" id="name" class="form-control text-center mt-2" required>
                    </div>
                    <div class="form-group p-2 my-1">
                        <label for="address">عنوان الطالب</label>
                        <input type="text" name="address" id="address" class="form-control text-center mt-2" required>
                    </div>
                    <button name="add" class="btn btn-success">اضافه طالب</button>
                    <button name="del" class="btn btn-success">حذف الطالب</button>
                </form>
            </div>
            <div class="col-lg-6 col-md-12">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>الرقم التسلسلى</th>
                        <th>اسم الطالب</th>
                        <th>عنوان الطالب</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($res)): ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>