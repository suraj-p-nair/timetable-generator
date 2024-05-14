<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="enter_sub.css">
<?php ?>
<?php 
    session_start();
    include_once("connection.php");
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <h2>Btech First Year</h2>
    <?php 
        $query="select * from sub1";
        $subjects= $conn->query($query);
    ?>
<form action="add_sub.php" method="post">
  <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Theory hours</th>
            <th>Tutorial hours</th>
            <th>Lab hours</th>
            <th>Credits</th>
            <th>Type</th>
        </tr>
        <?php 
            while($rows = $subjects->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo strtoupper($rows['sub_code']);?></td>
            <td><?php echo strtoupper($rows['sub_name']);?></td>
            <td><?php echo strtoupper($rows['theory']);?></td>
            <td><?php echo strtoupper($rows['tutorial']);?></td>
            <td><?php echo strtoupper($rows['lab']);?></td>
            <td><?php echo strtoupper($rows['credits']);?></td>
            <td><?php echo strtoupper($rows['type']);?></td>  
        </tr>
        <?php }?>
        <tr>
            <div class="details">
            <input type="hidden" name="varname" value="sub1">
            <td><input type="text" name="sub_code" id="sub_code" placeholder="sub_code" required></td>
            <td><input type="text" name="sub_name" id="sub_name" placeholder="sub_name" required></td>
            <td><input type="text" name="theory_hrs" id="theory_hrs" placeholder="theory_hrs" required></td>
            <td><input type="text" name="tutorial_hrs" id="tutorial_hrs" placeholder="tutorial_hrs" required></td>
            <td><input type="text" name="lab_hrs" id="lab_hrs" placeholder="lab_hrs" required></td>
            <td><input type="text" name="credits" id="credits" placeholder="credits" required></td>
            <td><input type="text" name="type" id="type" placeholder="type" required></td>
            </div>
        </tr>
    
            
    </table>
    <input type="submit" class="button" value="Add">
    </form>
    <?php
    function delete($id){
        global $conn;
        $delete = $conn->prepare("DELETE FROM sub1 WHERE sub_code LIKE '$id'");
        $delete->execute();
    
    }

?>
<!-- container div is used -->
<div class="form-container">
<form method="post">
    <?php
        
        if (array_key_exists('submit', $_POST)) {
            delete($_POST['id']);
        }

    ?>
        <div class="id">
            <label for="id">Enter ID:</label>
            <input type="text" name="id" id="id">
        </div>
        
    <input type="submit" class="button1" value="Delete" name="submit">
    </form>
<h2>Btech Second Year</h2>
    <?php 
        $query="select * from sub2";
        $subjects= $conn->query($query);
    ?>

<form action="add_sub.php" method="post">
  <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Theory hours</th>
            <th>Tutorial hours</th>
            <th>Lab hours</th>
            <th>Credits</th>
            <th>Type</th>
        </tr>
        <?php 
            while($rows = $subjects->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo strtoupper($rows['sub_code']);?></td>
            <td><?php echo strtoupper($rows['sub_name']);?></td>
            <td><?php echo strtoupper($rows['theory']);?></td>
            <td><?php echo strtoupper($rows['tutorial']);?></td>
            <td><?php echo strtoupper($rows['lab']);?></td>
            <td><?php echo strtoupper($rows['credits']);?></td>
            <td><?php echo strtoupper($rows['type']);?></td>  
        </tr>
        <?php }?>
        <tr>
            <div class="details">
            <input type="hidden" name="varname" value="sub2">
            <td><input type="text" name="sub_code" id="sub_code" placeholder="sub_code" required></td>
            <td><input type="text" name="sub_name" id="sub_name" placeholder="sub_name" required></td>
            <td><input type="text" name="theory_hrs" id="theory_hrs" placeholder="theory_hrs" required></td>
            <td><input type="text" name="tutorial_hrs" id="tutorial_hrs" placeholder="tutorial_hrs" required></td>
            <td><input type="text" name="lab_hrs" id="lab_hrs" placeholder="lab_hrs" required></td>
            <td><input type="text" name="credits" id="credits" placeholder="credits" required></td>
            <td><input type="text" name="type" id="type" placeholder="type" required></td>
            </div>
        </tr>
    </table>
    <input type="submit" class="button" value="Add">        
</form>
</form>
    <?php
    function delete1($id){
        global $conn;
        $delete1 = $conn->prepare("DELETE FROM sub2 WHERE sub_code LIKE '$id'");
        $delete1->execute();
    
    }

?>
<!-- container div is used -->
<div class="form-container">
<form method="post">
    <?php
        
        if (array_key_exists('submit', $_POST)) {
            delete1($_POST['id']);
        }

    ?>
        <div class="id">
            <label for="id">Enter ID:</label>
            <input type="text" name="id" id="id">
        </div>
        
    <input type="submit" class="button1" value="Delete" name="submit">
    </form>
<h2>Btech Third Year</h2>
    <?php 
        $query="select * from sub3";
        $subjects= $conn->query($query);
    ?>

<form action="add_sub.php" method="post">
  <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Theory hours</th>
            <th>Tutorial hours</th>
            <th>Lab hours</th>
            <th>Credits</th>
            <th>Type</th>
        </tr>
        <?php 
            while($rows = $subjects->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo strtoupper($rows['sub_code']);?></td>
            <td><?php echo strtoupper($rows['sub_name']);?></td>
            <td><?php echo strtoupper($rows['theory']);?></td>
            <td><?php echo strtoupper($rows['tutorial']);?></td>
            <td><?php echo strtoupper($rows['lab']);?></td>
            <td><?php echo strtoupper($rows['credits']);?></td>
            <td><?php echo strtoupper($rows['type']);?></td>  
        </tr>
        <?php }?>
        <tr>
            <div class="details">
            <input type="hidden" name="varname" value="sub3">
            <td><input type="text" name="sub_code" id="sub_code" placeholder="sub_code" required></td>
            <td><input type="text" name="sub_name" id="sub_name" placeholder="sub_name" required></td>
            <td><input type="text" name="theory_hrs" id="theory_hrs" placeholder="theory_hrs" required></td>
            <td><input type="text" name="tutorial_hrs" id="tutorial_hrs" placeholder="tutorial_hrs" required></td>
            <td><input type="text" name="lab_hrs" id="lab_hrs" placeholder="lab_hrs" required></td>
            <td><input type="text" name="credits" id="credits" placeholder="credits" required></td>
            <td><input type="text" name="type" id="type" placeholder="type" required></td>
            </div>
        </tr>
    </table>
    <input type="submit" class="button" value="Add">        
</form>
</form>
    <?php
    function delete2($id){
        global $conn;
        $delete2 = $conn->prepare("DELETE FROM sub3 WHERE sub_code LIKE '$id'");
        $delete2->execute();
    
    }

?>
<!-- container div is used -->
<div class="form-container">
<form method="post">
    <?php
        
        if (array_key_exists('submit', $_POST)) {
            delete2($_POST['id']);
        }

    ?>
        <div class="id">
            <label for="id">Enter ID:</label>
            <input type="text" name="id" id="id">
        </div>
        
    <input type="submit" class="button1" value="Delete" name="submit">
    </form>
<h2>Btech Fourth Year</h2>
    <?php 
        $query="select * from sub4";
        $subjects= $conn->query($query);
    ?>

<form action="add_sub.php" method="post">
  <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Theory hours</th>
            <th>Tutorial hours</th>
            <th>Lab hours</th>
            <th>Credits</th>
            <th>Type</th>
        </tr>
        <?php 
            while($rows = $subjects->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo strtoupper($rows['sub_code']);?></td>
            <td><?php echo strtoupper($rows['sub_name']);?></td>
            <td><?php echo strtoupper($rows['theory']);?></td>
            <td><?php echo strtoupper($rows['tutorial']);?></td>
            <td><?php echo strtoupper($rows['lab']);?></td>
            <td><?php echo strtoupper($rows['credits']);?></td>
            <td><?php echo strtoupper($rows['type']);?></td>  
        </tr>
        <?php }?>
        <tr>
            <div class="details">
            <input type="hidden" name="varname" value="sub4">
            <td><input type="text" name="sub_code" id="sub_code" placeholder="sub_code" required></td>
            <td><input type="text" name="sub_name" id="sub_name" placeholder="sub_name" required></td>
            <td><input type="text" name="theory_hrs" id="theory_hrs" placeholder="theory_hrs" required></td>
            <td><input type="text" name="tutorial_hrs" id="tutorial_hrs" placeholder="tutorial_hrs" required></td>
            <td><input type="text" name="lab_hrs" id="lab_hrs" placeholder="lab_hrs" required></td>
            <td><input type="text" name="credits" id="credits" placeholder="credits" required></td>
            <td><input type="text" name="type" id="type" placeholder="type" required></td>
            </div>
        </tr>
    </table>
    <input type="submit" class="button" value="Add">        
</form>
</form>
    <?php
    function delete3($id){
        global $conn;
        $delete3 = $conn->prepare("DELETE FROM sub4 WHERE sub_code LIKE '$id'");
        $delete3->execute();
    
    }

?>
<!-- container div is used -->
<div class="form-container">
<form method="post">
    <?php
        
        if (array_key_exists('submit', $_POST)) {
            delete3($_POST['id']);
        }

    ?>
        <div class="id">
            <label for="id">Enter ID:</label>
            <input type="text" name="id" id="id">
        </div>
        
    <input type="submit" class="button1" value="Delete" name="submit">
    </form>
<h2>Mtech First Year</h2>
    <?php 
        $query="select * from sub5";
        $subjects= $conn->query($query);
    ?>

<form action="add_sub.php" method="post">
  <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Theory hours</th>
            <th>Tutorial hours</th>
            <th>Lab hours</th>
            <th>Credits</th>
            <th>Type</th>
        </tr>
        <?php 
            while($rows = $subjects->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo strtoupper($rows['sub_code']);?></td>
            <td><?php echo strtoupper($rows['sub_name']);?></td>
            <td><?php echo strtoupper($rows['theory']);?></td>
            <td><?php echo strtoupper($rows['tutorial']);?></td>
            <td><?php echo strtoupper($rows['lab']);?></td>
            <td><?php echo strtoupper($rows['credits']);?></td>
            <td><?php echo strtoupper($rows['type']);?></td>  
        </tr>
        <?php }?>
        <tr>
            <div class="details">
            <input type="hidden" name="varname" value="sub5">
            <td><input type="text" name="sub_code" id="sub_code" placeholder="sub_code" required></td>
            <td><input type="text" name="sub_name" id="sub_name" placeholder="sub_name" required></td>
            <td><input type="text" name="theory_hrs" id="theory_hrs" placeholder="theory_hrs" required></td>
            <td><input type="text" name="tutorial_hrs" id="tutorial_hrs" placeholder="tutorial_hrs" required></td>
            <td><input type="text" name="lab_hrs" id="lab_hrs" placeholder="lab_hrs" required></td>
            <td><input type="text" name="credits" id="credits" placeholder="credits" required></td>
            <td><input type="text" name="type" id="type" placeholder="type" required></td>
            </div>
        </tr>
    </table>
    <input type="submit" class="button" value="Add">        
</form>
</form>
    <?php
    function delete4($id){
        global $conn;
        $delete4 = $conn->prepare("DELETE FROM sub5 WHERE sub_code LIKE '$id'");
        $delete4->execute();
    
    }

?>
<!-- container div is used -->
<div class="form-container">
<form method="post">
    <?php
        
        if (array_key_exists('submit', $_POST)) {
            delete4($_POST['id']);
        }

    ?>
        <div class="id">
            <label for="id">Enter ID:</label>
            <input type="text" name="id" id="id">
        </div>
        
    <input type="submit" class="button1" value="Delete" name="submit">
    </form>
<h2>Mtech Second Year</h2>
    <?php 
        $query="select * from sub6";
        $subjects= $conn->query($query);
    ?>

<form action="add_sub.php" method="post">
  <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Theory hours</th>
            <th>Tutorial hours</th>
            <th>Lab hours</th>
            <th>Credits</th>
            <th>Type</th>
        </tr>
        <?php 
            while($rows = $subjects->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo strtoupper($rows['sub_code']);?></td>
            <td><?php echo strtoupper($rows['sub_name']);?></td>
            <td><?php echo strtoupper($rows['theory']);?></td>
            <td><?php echo strtoupper($rows['tutorial']);?></td>
            <td><?php echo strtoupper($rows['lab']);?></td>
            <td><?php echo strtoupper($rows['credits']);?></td>
            <td><?php echo strtoupper($rows['type']);?></td>  
        </tr>
        <?php }?>
        <tr>
            <div class="details">
            <input type="hidden" name="varname" value="sub6">
            <td><input type="text" name="sub_code" id="sub_code" placeholder="sub_code" required></td>
            <td><input type="text" name="sub_name" id="sub_name" placeholder="sub_name" required></td>
            <td><input type="text" name="theory_hrs" id="theory_hrs" placeholder="theory_hrs" required></td>
            <td><input type="text" name="tutorial_hrs" id="tutorial_hrs" placeholder="tutorial_hrs" required></td>
            <td><input type="text" name="lab_hrs" id="lab_hrs" placeholder="lab_hrs" required></td>
            <td><input type="text" name="credits" id="credits" placeholder="credits" required></td>
            <td><input type="text" name="type" id="type" placeholder="type" required></td>
            </div>
        </tr>
    </table>
    <input type="submit" class="button" value="Add">        
</form>

</form>
    <?php
    function delete5($id){
        global $conn;
        $delete5 = $conn->prepare("DELETE FROM sub6 WHERE sub_code LIKE '$id'");
        $delete5->execute();
    
    }

?>
<!-- container div is used -->
<div class="form-container">
<form method="post">
    <?php
        
        if (array_key_exists('submit', $_POST)) {
            delete5($_POST['id']);
        }

    ?>
        <div class="id">
            <label for="id">Enter ID:</label>
            <input type="text" name="id" id="id">
        </div>
        
    <input type="submit" class="button1" value="Delete" name="submit">
    </form>
    
</body>
</html>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

h2 {
    text-decoration:underline;
    margin-bottom: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: center;
}

th {
    background-color: #f2f2f2;
}

input[type="text"] {
    padding: 5px;
    border-radius: 3px;
    border: 1px solid #ccc;
    width: 100%;
    box-sizing: border-box;
}

.details {
    display: flex;
    flex-direction: column;
    margin-bottom: 10px;
}

.button {
    padding: 8px 16px;
    background-color: #4CAF50;
    border: none;
    color: #fff;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    border-radius: 3px;
    cursor: pointer;
}

.button:hover {
    background-color: #45a049;
}
.button1 {
    padding: 8px 16px;
    background-color: red;
    border: none;
    color: #fff;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    border-radius: 3px;
    cursor: pointer;
}

.button1:hover {
    background-color: #45a049;
}

</style>