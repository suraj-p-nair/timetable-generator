<!DOCTYPE html>
<html lang="en">
<?php ?>
<head>
    <link rel="stylesheet" href="fix_sub.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    session_start();
    include_once("connection.php");
    ?>
</head>
<body>
<form action="fixed_enter.php" method="post">
<div class="row">
      <div class="column">
        <table>
            <?php 
                $subjects=$conn->query("SELECT * FROM sub1");
                $tt1=$conn->query("SELECT * from tt1");
            ?>
            <caption><h4>BTECH FIRST YEAR</h4></caption>
                <tr>
                    <th>DAY</th><th>HR1</th><th>HR2</th><th>HR3</th><th>HR4</th><th>HR5</th><th>HR6</th>
                </tr>
                <?php 
                    while($rows = $tt1->fetch(PDO::FETCH_ASSOC)){
                ?>
            <tr>
                <td><?php echo $rows['day'] ?></td>
                <input type="hidden" name="varname[]" value="tt1">
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr1'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr2'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr3'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr4'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr5'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr6'];
                ?>
                 ></td>
            </tr>
            <?php 
            }
            ?>
        </table>
    </div>
    
    <div class="column">
        <table class="subs">
            <tr>
                <th>CODE</th>
                <th>NAME</th>
                <th>TYPE</th>
            </tr>
        <?php 
            while($rows = $subjects->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo $rows['sub_code']?></td>
            <td><?php echo strtoupper($rows['sub_name'])?></td>
            <td><?php echo strtoupper($rows['type'])?></td>
        </tr>
        <?php 
            }
        ?>
        </table>
    </div>
        </div>
<div class="row">
    <div class="column">
        <table>
            <?php 
                $subjects=$conn->query("SELECT * FROM sub2");
                $tt1=$conn->query("SELECT * from tt2");
            ?>
            <caption><h4>BTECH SECOND YEAR</h4></caption>
                <tr>
                    <th>DAY</th><th>HR1</th><th>HR2</th><th>HR3</th><th>HR4</th><th>HR5</th><th>HR6</th>
                </tr>
                <?php 
                    while($rows = $tt1->fetch(PDO::FETCH_ASSOC)){
                ?>
            <tr>
                <td><?php echo $rows['day'] ?></td>
                <input type="hidden" name="varname[]" value="tt2">
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr1'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr2'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr3'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr4'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr5'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr6'];
                ?>
                 ></td>
            </tr>
            <?php 
            }
            ?>
        </table>
    </div>
    <div class="column">
        <table class="subs">
            <tr>
                <th>CODE</th>
                <th>NAME</th>
                <th>TYPE</th>
            </tr>
        <?php 
            while($rows = $subjects->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo $rows['sub_code']?></td>
            <td><?php echo strtoupper($rows['sub_name'])?></td>
            <td><?php echo strtoupper($rows['type'])?></td>
        </tr>
        <?php 
            }
        ?>
        </table>
    </div>
</div>

<div class="row">

    <div class="column">
        <table>
            <?php 
                $subjects=$conn->query("SELECT * FROM sub3");
                $tt1=$conn->query("SELECT * from tt3");
            ?>
            <caption><h4>BTECH THIRD YEAR</h4></caption>
                <tr>
                    <th>DAY</th><th>HR1</th><th>HR2</th><th>HR3</th><th>HR4</th><th>HR5</th><th>HR6</th>
                </tr>
                <?php 
                    while($rows = $tt1->fetch(PDO::FETCH_ASSOC)){
                ?>
            <tr>
                <td><?php echo $rows['day'] ?></td>
                <input type="hidden" name="varname[]" value="tt3">
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr1'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr2'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr3'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr4'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr5'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr6'];
                ?>
                 ></td>
            </tr>
            <?php 
            }
            ?>
        </table>
    </div>
    <div class="column">
        <table class="subs">
            <tr>
                <th>CODE</th>
                <th>NAME</th>
                <th>TYPE</th>
            </tr>
        <?php 
            while($rows = $subjects->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo $rows['sub_code']?></td>
            <td><?php echo strtoupper($rows['sub_name'])?></td>
            <td><?php echo strtoupper($rows['type'])?></td>
        </tr>
        <?php 
            }
        ?>
        </table>
    </div>
    </div>

<div class="row">
    <div class="column">
        <table>
            <?php 
                $subjects=$conn->query("SELECT * FROM sub4");
                $tt1=$conn->query("SELECT * from tt4");
            ?>
            <caption><h4>BTECH FOURTH YEAR</h4></caption>
                <tr>
                    <th>DAY</th><th>HR1</th><th>HR2</th><th>HR3</th><th>HR4</th><th>HR5</th><th>HR6</th>
                </tr>
                <?php 
                    while($rows = $tt1->fetch(PDO::FETCH_ASSOC)){
                ?>
            <tr>
                <td><?php echo $rows['day'] ?></td>
                <input type="hidden" name="varname[]" value="tt4">
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr1'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr2'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr3'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr4'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr5'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr6'];
                ?>
                 ></td>
            </tr>
            <?php 
            }
            ?>
        </table>
    </div>
    <div class="column">
        <table class="subs">
            <tr>
                <th>CODE</th>
                <th>NAME</th>
                <th>TYPE</th>
            </tr>
        <?php 
            while($rows = $subjects->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo $rows['sub_code']?></td>
            <td><?php echo strtoupper($rows['sub_name'])?></td>
            <td><?php echo strtoupper($rows['type'])?></td>
        </tr>
        <?php 
            }
        ?>
        </table>
    </div>
    </div>

<div class="row">
    <div class="column">
        <table>
            <?php 
                $subjects=$conn->query("SELECT * FROM sub5");
                $tt1=$conn->query("SELECT * from tt5");
            ?>
            <caption><h4>MTECH FIRST YEAR</h4></caption>
                <tr>
                    <th>DAY</th><th>HR1</th><th>HR2</th><th>HR3</th><th>HR4</th><th>HR5</th><th>HR6</th>
                </tr>
                <?php 
                    while($rows = $tt1->fetch(PDO::FETCH_ASSOC)){
                ?>
            <tr>
                <td><?php echo $rows['day'] ?></td>
                <input type="hidden" name="varname[]" value="tt5">
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr1'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr2'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr3'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr4'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr5'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr6'];
                ?>
                 ></td>
            </tr>
            <?php 
            }
            ?>
        </table>
    </div>
    <div class="column">
        <table class="subs">
            <tr>
                <th>CODE</th>
                <th>NAME</th>
                <th>TYPE</th>
            </tr>
        <?php 
            while($rows = $subjects->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo $rows['sub_code']?></td>
            <td><?php echo strtoupper($rows['sub_name'])?></td>
            <td><?php echo strtoupper($rows['type'])?></td>
        </tr>
        <?php 
            }
        ?>
        </table>
    </div>
        </div>

        <div class="row">
    <div class="column">
        <table>
            <?php 
                $subjects=$conn->query("SELECT * FROM sub6");
                $tt1=$conn->query("SELECT * from tt6");
            ?>
            <caption><h4>MTECH SECOND YEAR</h4></caption>
                <tr>
                    <th>DAY</th><th>HR1</th><th>HR2</th><th>HR3</th><th>HR4</th><th>HR5</th><th>HR6</th>
                </tr>
                <?php 
                    while($rows = $tt1->fetch(PDO::FETCH_ASSOC)){
                ?>
            <tr>
                <td><?php echo $rows['day'] ?></td>
                <input type="hidden" name="varname[]" value="tt6">
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr1'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr2'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr3'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr4'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr5'];
                ?>
                 ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value=
                <?php 
                echo $rows['hr6'];
                ?>
                 ></td>
            </tr>
            <?php 
            }
            ?>
        </table>
    </div>
    <div class="column">
        <table class="subs">
            <tr>
                <th>CODE</th>
                <th>NAME</th>
                <th>TYPE</th>
            </tr>
        <?php 
            while($rows = $subjects->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo $rows['sub_code']?></td>
            <td><?php echo strtoupper($rows['sub_name'])?></td>
            <td><?php echo strtoupper($rows['type'])?></td>
        </tr>
        <?php 
            }
        ?>
        </table>
    </div>
    
</div>
        <input type="submit" value="save">
    </form>
  


    
</body>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }

    .row {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .column {
        flex: 1;
        margin: 0 10px;
        background-color: #fff;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h3, h4 {
        text-align: center;
        margin-top: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .textfield {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border-radius: 4px;
        border: 1px solid #ccc;
        transition: border-color 0.3s ease-in-out;
    }

    .textfield:focus {
        outline: none;
        border-color: #86b7fe;
    }

    .subs {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .subs th, .subs td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    /* Colorful styles */
    .column:nth-child(odd) {
        background-color: white;
    }

    table tr:nth-child(2n) {
        background-color: #f2f2f2;
    }

    input[type="text"] {
        background-color: #f9f9f9;
    }
</style>
</html>