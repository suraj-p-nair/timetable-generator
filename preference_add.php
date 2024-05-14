<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once('connection.php');
    session_start();
    $current_user = $_SESSION['$current_user'];

    $stmt = $conn->prepare("SELECT * FROM faculty_preference");
    $stmt->execute();
    $faculty = $stmt->fetchAll();
    $fac_count = count($faculty);
    $_SESSION['$faculty_count'] = $fac_count;
    $user_count = 0;

    foreach ($faculty as $row) {
        if ($row['name'] == $current_user) {
            $current_user_count = $user_count + 1;
            $_SESSION['$current_user_num'] = $current_user_count;
        }
        $user_count++;
    }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        
        form {
            margin: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }
        
        .heading {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        
        .textfield {
            width: 40px;
            text-align: center;
        }
        
        .save {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        
        .save:hover {
            background-color: #45a049;
        }
        
        .empty-row-highlight {
            background-color: yellow;
        }
    </style>
</head>
<body>
<form action="preference_enter.php" method="post">
    <h2>THEORY</h2>
    <table>
        <tr>
            <th style="border:none;"></th>
            <?php foreach ($faculty as $row) { ?>
                <th><?php echo $row['name']; ?></th>
            <?php } ?>
        </tr>
        
        <?php
        $classes = array("FIRST YEAR","SECOND YEAR","THIRD YEAR","FOURTH YEAR","MTECH FIRST YEAR","MTECH SECOND YEAR");
        $tables = array("sub1", "sub2", "sub3", "sub4", "sub5", "sub6");
        
        foreach (array_combine($tables, $classes) as $table => $class) {?>
        <tr>
            <td class="heading" colspan="<?php echo $fac_count + 1 ?>"><?php echo $class ?></td>
        </tr>
        <?php
            $stmt = $conn->prepare("SELECT * FROM $table");
            $stmt->execute();
            $subjects = $stmt->fetchAll();

            foreach ($subjects as $row) { 
                if($row['type']!="LAB"){ ?>
                <tr <?php if(!hasNumericals($faculty, $row)) echo 'class="empty-row-highlight"'; ?>>
                    <td><?php echo strtoupper($row['sub_name']); ?></td>
                    <?php
                    foreach ($faculty as $rows) {
                        $value = '';
                        $value = ($rows['p1'] == $row['sub_name']) ? '1' : (($rows['p2'] == $row['sub_name']) ? '2' : (($rows['p3'] == $row['sub_name']) ? '3' : (($rows['p4'] == $row['sub_name']) ? '4' : '')));
                        if ($rows['name'] == $current_user) {?>
                            <td><input type="text" class="textfield" name="sub[]" value="<?php echo $value; ?>" /></td>
                        <?php } else {?>
                            <td><input type="text" class="textfield" name="sub[]" value="<?php echo $value; ?>" readonly /></td>
                        <?php }
                        ?>
                        
                    <?php } ?>
                </tr>
            <?php }}
        } ?>
    </table>
    <h2>LAB</h2>
    <table>
        <tr>
            <th style="border:none;"></th>
            <?php foreach ($faculty as $row) { ?>
                <th><?php echo $row['name']; ?></th>
            <?php } ?>
        </tr>
        
        <?php
        $classes = array("FIRST YEAR","SECOND YEAR","THIRD YEAR","FOURTH YEAR","MTECH FIRST YEAR","MTECH SECOND YEAR");
        $tables = array("sub1", "sub2", "sub3", "sub4", "sub5", "sub6");
        
        foreach (array_combine($tables, $classes) as $table => $class) {?>
        <tr>
            <td class="heading" colspan="<?php echo $fac_count + 1 ?>"><?php echo $class ?></td>
        </tr>
        <?php
            $stmt = $conn->prepare("SELECT * FROM $table");
            $stmt->execute();
            $subjects = $stmt->fetchAll();

            foreach ($subjects as $row) { 
                if($row['type']=="LAB"){ ?>
                <tr <?php if(!hasNumericals($faculty, $row)) echo 'class="empty-row-highlight"'; ?>>
                    <td><?php echo strtoupper($row['sub_name']); ?></td>
                    <?php
                    foreach ($faculty as $rows) {
                        $value = '';
                        $value = ($rows['l1'] == $row['sub_name']) ? '1' : (($rows['l2'] == $row['sub_name']) ? '2' : '');
                        if ($rows['name'] == $current_user) {?>
                            <td><input type="text" class="textfield" name="lab[]" value="<?php echo $value; ?>" /></td>
                        <?php } else {?>
                            <td><input type="text" class="textfield" name="lab[]" value="<?php echo $value; ?>" readonly /></td>
                        <?php }
                        ?>
                        
                    <?php } ?>
                </tr>
            <?php }}
        } ?>
    </table>
    <input type="submit" class="save" value="Save" name="save">
</form>
</body>
</html>

<?php
function hasNumericals($faculty, $row) {
    foreach ($faculty as $rows) {
       $value1=(($rows['l1'] == $row['sub_name']) ? '1' : (($rows['l2'] == $row['sub_name']) ? '2' :''));
       $value = ($rows['p1'] == $row['sub_name']) ? '1' : (($rows['p2'] == $row['sub_name']) ? '2' : (($rows['p3'] == $row['sub_name']) ? '3' : (($rows['p4'] == $row['sub_name']) ? '4' : '')));
        if (is_numeric(($value))){
            return true;
        }
        else if(is_numeric(($value1))){
            return true;
        }
    }
    return false;
}
?>
