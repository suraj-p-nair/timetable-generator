<?php
    include_once('connection.php');
    session_start();
    $qry = $conn->prepare("SELECT * FROM faculty");
    $qry->execute();
    $faculty=$qry->fetchAll();
    function delete($id){
        global $conn;
        $delete = $conn->prepare("DELETE FROM faculty WHERE id like $id");
        $delete->execute();
        $delete = $conn->prepare("DELETE FROM login WHERE id like $id");
        $delete->execute();
        $delete = $conn->prepare("DELETE FROM faculty_preference WHERE id like $id");
        $delete->execute();
        $delete = $conn->prepare("DELETE FROM faculty_preference_final WHERE id like $id");
        $delete->execute();
        header("location: delete_faculty.php");
        die();
    }
    function logout(){
        session_destroy();
        header("location: index.php");
        die("logout");
    }
?>
<!-- container div is used -->
 <div class="container"> 
        <div class="logout-form">
<form method="post">
    <input type="submit" value="Logout" name="logout">
</form>
</div>
<!-- container div is used -->
<div class="table-container">
<table>
    <tr>
        <th>FACULTY ID</th>
        <th>NAME</th>
        <th>DESIGNATION</th>
    </tr>

    <?php 
        foreach($faculty as $fac){
    ?>  
        <tr>
            <td><?php echo $fac['id'];?></td>
            <td><?php echo $fac['name'];?></td>
            <td><?php echo $fac['designation'];?></td>
        </tr>
    <?php
        }
    ?>
</table>
</div>
<!-- container div is used -->
<div class="form-container">
<form method="post">
    <?php
        if (array_key_exists('submit', $_POST)) {
            delete($_POST['id']);
        }
        if (array_key_exists('logout', $_POST)) {
            logout();
        }
    ?>
        <div class="id">
            <label for="id">Enter ID:</label>
            <input type="text" name="id" id="id">
        </div>
        <input type="submit" value="Delete" name="submit">
</form>
</div>
 </div>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 20px;
        }

        .table-container {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .form-container {
            display: flex;
            align-items: center;
        }

        .form-container label {
            margin-right: 10px;
        }

        .form-container input[type="text"] {
            width: 200px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-container input[type="submit"] {
            background-color: red;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .logout-form {
            text-align: right;
            margin-top: 20px;
        }

        .logout-form input[type="submit"] {
            background-color: blue;
            color: #fff;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-form input[type="submit"]:hover {
            background-color: #c82333;
         }
    
</style>

<script>
    
  </script>