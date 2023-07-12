<?php
try{
  include('./config/db_connect.php');

  $sql = $conn->prepare("SELECT name, salary, profession FROM employees");
  $sql->execute();
  $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

  $employees = $sql->fetchALL();
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
  $conn = null;
  
?>

<!DOCTYPE html>
<html>
  <?php include('templates/header.php') ?>
    <h2 style="color: chocolate; text-align:center;">Employees:
    </h2>
      <?php foreach($employees as $employee): ?>
        <div style="font-size: 30px;">
          <div style="color: chocolate; text-align:center;">
            <h3>
              <?php echo htmlspecialchars($employee['name']);?>
            </h3>
            <p><?php echo 'Salary: '. htmlspecialchars($employee['salary']);?></p>
            <p><?php echo 'Profession: '. htmlspecialchars($employee['profession']);?></p>
          </div>
        </div>
      <?php endforeach; ?>
  
  <?php include('templates/footer.php') ?>
</html>
