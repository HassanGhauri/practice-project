<?php
    include('./config/db_connect.php');


    $name = $salary = $profession = '';

    $errors = array('name'=>'', 'salary'=>'', 'profession'=>'');

   if(isset($_POST['submit'])){

    if(empty($_POST['name'])){
        $errors['name'] = 'name is required. <br>';
    } else {
        $name = $_POST['name'];
    }

    if(empty($_POST['salary'])){
        $errors['salary'] = 'salary is required. <br>';
    } else {
        $salary = $_POST['salary'];
    }

    if(empty($_POST['profession'])){
        $errors['profession'] = 'profession is required. <br>';
    } else {
        $profession = $_POST['profession'];
    }

    if(array_filter($errors)){
        //echo 'errors in the form';
    } else {
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $salary = mysqli_real_escape_string($conn,$_POST['salary']);
        $profession = mysqli_real_escape_string($conn,$_POST['profession']);

        $sql = "INSERT INTO employees(name,salary,profession)
         VALUES('$name','$salary','$profession')";
        if(mysqli_query($conn,$sql)){
            header('Location: index.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }
   }

?>


<!DOCTYPE html>
<html>
    <?php include('templates/header.php') ?>
    <h3 class="heading1">Sign Up</h3>
    <div class="div1">
        <form  action="signup.php" method="POST">
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name) ;?>"><br>
            <div class="error"><?php echo $errors['name']; ?></div>
            <label for="salary">Salary:</label><br>
            <input type="text" name="salary" id="salary" value="<?php echo htmlspecialchars($salary) ;?>"><br>
            <div class="error"><?php echo $errors['salary']; ?></div>
            <label for="">Profession:</label><br>
            <input type="text" name="profession" id="profession" value="<?php echo htmlspecialchars($profession) ;?>"><br>
            <div class="error"><?php echo $errors['profession']; ?></div>
            <div class="div2">
                <input class="input1" type="submit" name="submit" value="submit">
            </div>
        </form>
    </div>
    <?php include('templates/footer.php') ?>
</html>