<?php

    include('./config/db_connect.php');

    $name = $profession = $not_employee ='';

    $errors = array('name'=>'','profession'=>'','not_employee'=>'');

   if(isset($_POST['submit'])){

    if(empty($_POST['name'])){
        $errors['name'] = 'name is required. <br>';
    } else {
        $name = $_POST['name'];
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
        $profession = mysqli_real_escape_string($conn,$_POST['profession']);

        $sql = 'SELECT name, profession FROM employees';

        $result = mysqli_query($conn, $sql);

        $employees = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach($employees as $employee){
            if($name == $employee['name'] && $profession == $employee['profession']){
                header('Location: welcome.php');
            } else {
                $errors['not_employee'] = 'You are not a registered employee!';
                //header('Location: welcome.php');
            }
        }
    } 
}

?>


<!DOCTYPE html>
<html>
    <?php include('templates/header.php') ?>
    <h3 class="heading1">Login</h3>
    <div class="div1">
        <form  action="login.php" method="POST">
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name) ;?>"><br>
            <div class="error"><?php echo $errors['name']; ?></div>
            <label for="">Profession:</label><br>
            <input type="text" name="profession" id="profession" value="<?php echo htmlspecialchars($profession) ;?>"><br>
            <div class="error"><?php echo $errors['profession']; ?></div>
            <div class="div2">
                <input class="input1" type="submit" name="submit" value="submit">
            </div>
            <div class="error"><?php echo $errors['not_employee']; ?></div>
        </form>
    </div>
    
    <?php include('templates/footer.php') ?>
</html>

