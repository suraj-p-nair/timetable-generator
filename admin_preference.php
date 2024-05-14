<!DOCTYPE html>
<html lang="en">
<head>

    <?php

    function assignSubjects($faculty, $sub1, $sub2, $sub3, $sub4, $lab1,$lab2) {
        $assignedSubjects = array();
        $matrix = array();

        for ($i = 0; $i < count($faculty); $i++) {
            if ($sub1[$i] == "") {
                $sub1[$i] = "-";
            }
            if ($sub2[$i] == "") {
                $sub2[$i] = "-";
            }
            if ($sub3[$i] == "") {
                $sub3[$i] = "-";
            }
            if ($sub4[$i] == "") {
                $sub4[$i] = "-";
            }
            if ($lab1[$i] == "") {
                $lab1[$i] = "-";
            }
            if ($lab2[$i] == "") {
                $lab2[$i] = "-";
            }
            
            if (!array_key_exists($lab1[$i], $assignedSubjects)) {
                array_push($assignedSubjects, $lab1[$i]);
                for ($x = 0; $x < count($faculty); $x++) {
                    if ($x != $i) {
                        if ($lab1[$x] == $lab1[$i] && $lab1[$i]!='PROJECT' && $lab1!='miniproj3' && $lab1[$i]!='MiniProjM') {
                            $lab1[$x] = "-";
                        }
                        if ($lab2[$x] == $lab1[$i] && $lab1[$i]!='PROJECT' && $lab1!='miniproj3' && $lab1[$i]!='MiniProjM') {
                            $lab2[$x] = "-";
                        }
                    }
                    if($lab1[$x]=='-'){
                        if($lab2[$x]!='-'){
                            $lab1[$x]=$lab2[$x];
                            $lab2[$x]='-';
                        }
                    }
                }
            }

            if (!array_key_exists($sub1[$i], $assignedSubjects)) {
                array_push($assignedSubjects, $sub1[$i]);
                for ($x = 0; $x < count($faculty); $x++) {
                    if ($x != $i) {
                        if ($sub1[$x] == $sub1[$i]) {
                            $sub1[$x] = "-";
                        }
                        if ($sub2[$x] == $sub1[$i]) {
                            $sub2[$x] = "-";
                        }
                        if ($sub3[$x] == $sub1[$i]) {
                            $sub3[$x] = "-";
                        }
                        if ($sub4[$x] == $sub1[$i]) {
                            $sub4[$x] = "-";
                        }
                    }

                    if ($sub1[$x] == "-") {
                        if ($sub2[$x] == "-") {
                            if ($sub3[$x] == "-") {
                                if ($sub4[$x] != "-") {
                                    $sub1[$x] = $sub4[$x];
                                    $sub4[$x] = "-";
                                }
                            } else {
                                $sub1[$x] = $sub3[$x];
                                if ($sub4[$x] == "-") {
                                    $sub3[$x] = "-";
                                } else {
                                    $sub[$x] = "-";
                                }
                            }
                        } else {
                            $sub1[$x] = $sub2[$x];
                            if ($sub3[$x] == "-") {
                                if ($sub4[$x] == "-") {
                                    $sub2[$x] = "-";
                                } else {
                                    $sub2[$x] = $sub4[$x];
                                    $sub4[$x] = "-";
                                }
                            } else {
                                $sub2[$x] = $sub3[$x];
                                if ($sub4[$x] == "-") {
                                    $sub3[$x] = "-";
                                } else {
                                    $sub3[$x] = $sub4[$x];
                                    $sub4[$x] = "-";
                                }
                            }
                        }
                    } else {
                        if ($sub2[$x] == "-") {
                            if ($sub3[$x] == "-") {
                                if ($sub4[$x] != "-") {
                                    $sub2[$x] = $sub4[$x];
                                    $sub4[$x] = "-";
                                }
                            } else {
                                $sub2[$x] = $sub3[$x];
                                if ($sub4[$x] == "-") {
                                    $sub3[$x] = "-";
                                } else {
                                    $sub3[$x] = $sub4[$x];
                                    $sub[$x] = "-";
                                }
                            }
                        } else {
                            if ($sub3[$x] == "-") {
                                if ($sub4[$x] != "-") {
                                    $sub3[$x] = $sub4[$x];
                                    $sub4[$x] = "-";
                                }
                            }
                        }
                    }
                }
            }

            
            for ($x = 0; $x < count($faculty); $x++) {
                $matrix[$x] = array($sub1[$x], $sub2[$x], $sub3[$x], $sub4[$x], $lab1[$x], $lab2[$x]);
            }
        }

        return $matrix;
    }

    ?>
    <?php
    include_once('connection.php');
    session_start();

    $qry = $conn->prepare("SELECT * FROM faculty_preference");
    $qry->execute();

    $faculty = [];
    $faculty_names = [];
    $sub1 = [];
    $sub2 = [];
    $sub3 = [];
    $sub4 = [];
    $lab1 = [];
    $lab2 = [];
    while ($rows = $qry->fetch(PDO::FETCH_ASSOC)) {
        array_push($faculty, $rows['id']);
        array_push($faculty_names, $rows['name']);
        array_push($sub1, $rows['p1']);
        array_push($sub2, $rows['p2']);
        array_push($sub3, $rows['p3']);
        array_push($sub4, $rows['p4']);
        array_push($lab1, $rows['l1']);
        array_push($lab2, $rows['l2']);
    }
    $teachers = array_map(function ($faculty, $sub1, $sub2, $sub3, $sub4, $lab1, $lab2) {
        return array($faculty, $sub1, $sub2, $sub3, $sub4, $lab1, $lab2);
    }, $faculty, $sub1, $sub2, $sub3, $sub4, $lab1, $lab2);

    $result = assignSubjects($faculty, $sub1, $sub2, $sub3, $sub4, $lab1, $lab2);
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="row">
    <div class="column">
        <form action="final_preference.php" method="post">
            <table >
                <tr>
                    <th>Name</th>
                    <th>Subject 1</th>
                    <th>Subject 2</th>
                    <th>Subject 3</th>
                    <th>Subject 4</th>
                    <th>Lab 1</th>
                    <th>Lab 2</th>
                </tr>
                <?php
                for ($x = 0; $x < sizeof($result); $x++) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $faculty_names[$x]; ?>
                        </td>
                        <?php
                        for ($y = 0; $y < sizeof($result[$x]); $y++) {
                            if($result[$x][$y]!='-'){
                            ?>
                            <input type="hidden" name="facname[]" value="<?php echo $faculty_names[$x]; ?>">
                            <td><input type="text" name="sub[]" class="textfield" value="<?php echo $result[$x][$y]; ?>"></td>
                            <?php
                            }
                            else{?>
                                <td><input type="text" name="sub[]" class="textfield" value="-"></td>
                                <?php
                            }
                        }
                        ?>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <input type="submit" value="save" class="save" name="save">
        </form>
    </div>
    <div class="column">
        <table>
            <tr>
                <th>Sub Code</th>
                <th>Sub Name</th>
            </tr>
            <tr><td colspan=2 style="text-align:center;font-weight: bold;
  text-decoration: underline;"> BTECH FIRST YEAR</td></tr>
            <?php
            $qry = "SELECT sub_code,sub_name from sub1";
            $sub = $conn->query($qry);
            while ($rows = $sub->fetch(PDO::FETCH_ASSOC)) {
                ?>
                

                <tr>
                    <td><?php echo $rows['sub_code'] ?></td>
                    <td><?php echo $rows['sub_name'] ?></td>
                </tr>
                <?php
            }
            ?>
            <tr><td colspan=2 style="text-align:center;font-weight: bold;
  text-decoration: underline;"> BTECH SECOND YEAR</td></tr> <?php
            $qry = "SELECT sub_code,sub_name from sub2";
            $sub = $conn->query($qry);
            while ($rows = $sub->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $rows['sub_code'] ?></td>
                    <td><?php echo $rows['sub_name'] ?></td>
                </tr>
                <?php
            }
            ?>
        <tr><td colspan=2 style="text-align:center;font-weight: bold;
  text-decoration: underline;"> BTECH THIRD YEAR</td></tr>
        <?php
            $qry = "SELECT sub_code,sub_name from sub3";
            $sub = $conn->query($qry);
            while ($rows = $sub->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $rows['sub_code'] ?></td>
                    <td><?php echo $rows['sub_name'] ?></td>
                </tr>
                <?php
            }
            ?>
            <tr><td colspan=2 style="text-align:center;font-weight: bold;
  text-decoration: underline;"> BTECH FOURTH YEAR</td></tr>
            <?php
            $qry = "SELECT sub_code,sub_name from sub4";
            $sub = $conn->query($qry);
            while ($rows = $sub->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $rows['sub_code'] ?></td>
                    <td><?php echo $rows['sub_name'] ?></td>
                </tr>
                <?php
            }
            ?>
            <tr><td colspan=2 style="text-align:center;font-weight: bold;
  text-decoration: underline;">MTECH FIRST YEAR</td></tr>
            <?php
            $qry = "SELECT sub_code,sub_name from sub5";
            $sub = $conn->query($qry);
            while ($rows = $sub->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $rows['sub_code'] ?></td>
                    <td><?php echo $rows['sub_name'] ?></td>
                </tr>
                <?php
            }
            ?>
            <tr><td colspan=2 style="text-align:center;font-weight: bold;
  text-decoration: underline;">MTECH SECOND YEAR</td></tr>
            <?php
            $qry = "SELECT sub_code,sub_name from sub6";
            $sub = $conn->query($qry);
            while ($rows = $sub->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $rows['sub_code'] ?></td>
                    <td><?php echo $rows['sub_name'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>

</body>

</html>
<style>
   /* Reset default browser styles */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

/* Apply a professional font */
body {
  font-family: Arial, sans-serif;
  background-color: #f1f1f1;
}

/* Create a two-column layout */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.column {
  float: left;
  width: 50%;
}

/* Style the tables */
table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 20px;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}

.textfield {
  width: 100%;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

/* Style the save button */
.save {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  transition: background-color 0.3s ease;
}

.save:hover {
  background-color: #45a049;
}

/* Add hover effect to table rows */
tr:hover {
  background-color: #f5f5f5;
}

/* Add some spacing and shadows */
.row {
  margin: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.column {
  padding: 20px;
}

/* Style the page title */
h1 {
  font-size: 24px;
  margin-bottom: 10px;
}

/* Style the table headers */
th {
  font-weight: bold;
}

/* Style the table cells */
td {
  vertical-align: middle;
}

/* Add some color to the save button */
.save {
  background-color: green;
  transition: background-color 0.3s ease;
}

.save:hover {
  background-color: #0056b3;
}

</style>
