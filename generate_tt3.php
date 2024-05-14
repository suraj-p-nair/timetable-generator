
<!DOCTYPE html>
<html lang="en">
<head>
<style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            width: 100%;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: #333;
            font-size: 28px;
            text-transform: uppercase;
        }

        table {
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
            width: 80%;
            max-width: 500px;
        }

        th, td {
            padding: 10px 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        th {
            background-color: #546e7a;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        caption {
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
            text-align: center;
            text-transform: uppercase;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
        }

        .extra-cell {
            background-color: #ffcc80;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Timetable</h1>
        <table>
    <caption>Btech First Year</caption>
            <tr>
                <th>Day</th>
                <th>9.00-10.00 </th>
                <th>10.00-11.00</th>
                <th>11.00-12.00</th>
                <th>13.00-14.00</th>
                <th>14.00-15.00</th>
                <th>15.00-16.00</th>
                            </tr>
            <?php
            $days=array(
                1 => 'Monday',
                2 => 'Tuesday',
                3 => 'Wednesday',
                4 => 'Thursday',
                5 => 'Friday',
                );
                function printm($mat){
                    global $days;
                    $i=1;
                    for($x=0;$x<sizeof($mat);$x++){
                        echo '<tr>';
                        echo'<td>'.$days[$i].'</td>';
                        for($y=0;$y<sizeof($mat[$x]);$y++){
                            echo '<td>'.$mat[$x][$y].'</td>';
                        }
                        $i++;
                        echo '</tr>';
                    }
                }
        
                function present($sub2,$pos,$tt1,$i,$j,$fac_sub){
                    $new = $tt1[$i][$j];
                    $old = $sub2[$pos][1];
                    
            
                    foreach($fac_sub as $row){
                        if((array_key_exists($new,$row))&&(array_key_exists($old,$row))){
                            echo $old;
                            echo $new;
                            return true;
                        }
                    }
                   return false;
                }
            
                include_once('connection.php');
                session_start();
            
                $tableNames = ['tt1', 'tt2', 'tt3', 'tt4', 'tt5', 'tt6'];
            
                foreach ($tableNames as $pos => $tableName) {
                    $variableName = 'tt' . ($pos + 1);
                    $$variableName = [];
            
                    $sql = "SELECT * FROM $tableName";
                    $result = $conn->query($sql);
            
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        array_push($$variableName, [$row['hr1'], $row['hr2'], $row['hr3'], $row['hr4'], $row['hr5'], $row['hr6']]);
                    }
                }
            
                    $sql = "SELECT * FROM labtt";
                    $result = $conn->query($sql);
                    $labtt = [];
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        array_push($labtt, [$row['hr1'], $row['hr2'], $row['hr3'], $row['hr4'], $row['hr5'], $row['hr6']]);
                    }
            
                $subjectTables = ['sub1', 'sub2', 'sub3', 'sub4', 'sub5', 'sub6'];
            
                foreach ($subjectTables as $pos => $tableName) {
                    $variableName = 'sub' . ($pos + 1);
                    $$variableName = [];
            
                    $sql = "SELECT * FROM $tableName";
                    $result = $conn->query($sql);
            
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        array_push($$variableName, [$row['sub_code'], $row['sub_name'], $row['theory'], $row['tutorial'],$row['lab'], $row['credits'], $row['type']]);
                    }
                }
            
                $fac_sub=[];
            
                $sql = "SELECT * FROM faculty_preference_final";
                $result = $conn->query($sql);
            
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    array_push($fac_sub, array($row['id'],$row['sub1'],$row['sub2']));
                }
               //Assigning labs in tt1 from sub1
                $r = count($tt1);
                $c = count($tt1[0]);
                for ($i = 0; $i < $r; $i++) {
                    for ($j = 0; $j < $c-1; $j++) {
                        if(($tt1[$i][$j]=='-' && $tt1[$i][$j+1]=='-' && $j<=1 && $labtt[$i][$j]=='-'&& $labtt[$i][$j+1]=='-') || ($tt1[$i][$j]=='-' && $tt1[$i][$j+1]=='-' && $j>=3 && $labtt[$i][$j]=='-'&& $labtt[$i][$j+1]=='-')){
                            for($x=0;$x<sizeof($sub1);$x++){
                                if($sub1[$x][6]=='LAB' && $sub1[$x][4]>0){
                                    $tt1[$i][$j]=$sub1[$x][1].'(L)';
                                    $tt1[$i][$j+1]=$sub1[$x][1].'(L)';
                                    $labtt[$i][$j]=$sub1[$x][1];
                                    $labtt[$i][$j+1]=$sub1[$x][1];
                                    
                                    $sub1[$x][4]-=2;
                                    
                                    break ;
                                }
                            }
                        }
                    }
                }
                $count = $sub1[0][2]+$sub1[0][3]+$sub1[1][2];
            
                //assigning remaining subjects
            
                for ($i = 0; $i < $r; $i++) {
                    for ($j = 0; $j < $c; $j++) {
                        if($tt1[$i][$j]=='-'){
                            while($count>0){
                                
                                $pos = rand(0,sizeof($sub1)-1);
                                if($sub1[$pos][2]>0){
                                    $tt1[$i][$j]=$sub1[$pos][1];
                                    $sub1[$pos][2]--;
                                    $count--;
                                    break;
                                }
                                if($sub1[$pos][3]>0){
                                    $tt1[$i][$j]=$sub1[$pos][1].'(T)';
                                    $sub1[$pos][3]--;
                                    $count--;
                                    break;
                                }
                            }
                        }
                    }
                }
                
                //checking to see if subjects are zero and slots are vacant
                for ($i = 0; $i < $r; $i++) {
                    for ($j = 0; $j < $c; $j++) {
                        if($tt1[$i][$j]=='-'){
                            $tt1[$i][$j]='EXTRA';
                        }
                    }
                }
            
            
                $r = count($tt2);
                $c = count($tt2[0]);
                for ($i = 0; $i < $r; $i++) {
                    for ($j = 0; $j < $c-2; $j++) {
                        if(($tt2[$i][$j]=='-' && $tt2[$i][$j+1]=='-' && $tt2[$i][$j+2]=='-' && $j==0 && $labtt[$i][$j]=='-'&& $labtt[$i][$j+1]=='-'&& $labtt[$i][$j+2]=='-') || ($tt1[$i][$j]=='-' && $tt1[$i][$j+1]=='-'&& $tt1[$i][$j+2]=='-' && $j>=3 && $labtt[$i][$j]=='-'&& $labtt[$i][$j+1]=='-'&& $labtt[$i][$j+2]=='-')){
                            for($x=0;$x<sizeof($sub2);$x++){
                                if($sub2[$x][6]=='LAB' && $sub2[$x][4]>0){
                                    $sub2[$x][3]=0;
                                    $tt2[$i][$j]=$sub2[$x][1].'(L)';
                                    $tt2[$i][$j+1]=$sub2[$x][1].'(L)';
                                    $tt2[$i][$j+2]=$sub2[$x][1].'(L)';
                                    
                                    $labtt[$i][$j]=$sub2[$x][1];
                                    $labtt[$i][$j+1]=$sub2[$x][1];
                                    $labtt[$i][$j+2]=$sub2[$x][1];
                                    
                                    $sub2[$x][4]-=3;
                                    break;
                                }
                            }
                        }
                    }
                }
            
                for($x=0;$x<sizeof($sub2);$x++){
                    if($sub2[$x][6]=='LAB'){
                        $sub2[$x][3]=0;
                    }
                    if($sub2[$x][6]=="MIN/HON"){
                        $sub2[$x][3]=0;
                    }
                    if($sub2[$x][2]>0){
                        $count+=$sub2[$x][2];
                    }
                    if($sub2[$x][3]>0){
                        $count+=$sub2[$x][3];
                    }
                }
            
            while($count>0){
                for ($i = 0; $i < $r; $i++) {
                    for ($j = 0; $j < $c; $j++) {
                        if($tt2[$i][$j]=='-'){
                            $pos = rand(0,sizeof($sub2)-1);
                            if(!present($sub2,$pos,$tt1,$i,$j,$fac_sub)){
                                if($sub2[$pos][2]>0){
                                    $tt2[$i][$j]=$sub2[$pos][1];
                                    $sub2[$pos][2]--;
                                    $count--;
                                    break;
                                }
                                if($sub2[$pos][3]>0){
                                    $tt2[$i][$j]=$sub2[$pos][1].'(T)';
                                    $sub2[$pos][3]--;
                                    $count--;
                                    break;
                                }
                            }
                            
                        }
                    }
                }
            }
            for ($i = 0; $i < $r; $i++) {
                for ($j = 0; $j < $c; $j++) {
                    if($tt2[$i][$j]=='-'){
                        $tt2[$i][$j]='EXTRA';
                    }
                }
            }
            
            $count=0;
            $r = count($tt3);
                $c = count($tt3[0]);
                for ($i = 0; $i < $r; $i++) {
                    for ($j = 0; $j < $c-2; $j++) {
                        if(($tt3[$i][$j]=='-' && $tt3[$i][$j+1]=='-' && $tt3[$i][$j+2]=='-' && $j==0 && $labtt[$i][$j]=='-'&& $labtt[$i][$j+1]=='-'&& $labtt[$i][$j+2]=='-') || ($tt3[$i][$j]=='-' && $tt3[$i][$j+1]=='-'&& $tt3[$i][$j+2]=='-' && $j>=3 && $labtt[$i][$j]=='-'&& $labtt[$i][$j+1]=='-'&& $labtt[$i][$j+2]=='-')){
                            for($x=0;$x<sizeof($sub3);$x++){
                                if($sub3[$x][6]=='LAB' && $sub3[$x][4]>0){
                                    $sub3[$x][3]=0;
                                    $tt3[$i][$j]=$sub3[$x][1].'(L)';
                                    $tt3[$i][$j+1]=$sub3[$x][1].'(L)';
                                    $tt3[$i][$j+2]=$sub3[$x][1].'(L)';
                                    
                                    $labtt[$i][$j]=$sub3[$x][1];
                                    $labtt[$i][$j+1]=$sub3[$x][1];
                                    $labtt[$i][$j+2]=$sub3[$x][1];
                                    
                                    $sub3[$x][4]-=3;
                                    break;
                                }
                            }
                        }
                    }
                }
            
                for($x=0;$x<sizeof($sub3);$x++){
                    if($sub3[$x][6]=='LAB'){
                        $sub3[$x][3]=0;
                    }
                    if($sub3[$x][6]=="MIN/HON"){
                        $sub3[$x][3]=0;
                    }
                    if($sub3[$x][2]>0){
                        $count+=$sub3[$x][2];
                    }
                    if($sub3[$x][3]>0){
                        $count+=$sub3[$x][3];
                    }
                }
                while($count>0){
                    for ($i = 0; $i < $r; $i++) {
                        for ($j = 0; $j < $c; $j++) {
                            if($tt3[$i][$j]=='-'){
                                $pos = rand(0,sizeof($sub3)-1);
                                if((!present($sub3,$pos,$tt1,$i,$j,$fac_sub)) && (!present($sub3,$pos,$tt2,$i,$j,$fac_sub))){
                                    if($sub3[$pos][2]>0){
                                        $tt3[$i][$j]=$sub3[$pos][1];
                                        $sub3[$pos][2]--;
                                        $count--;
                                        break;
                                    }
                                    if($sub3[$pos][3]>0){
                                        $tt3[$i][$j]=$sub3[$pos][1].'(T)';
                                        $sub3[$pos][3]--;
                                        $count--;
                                        break;
                                    }
                                }
                                
                            }
                        }
                    }
                }
            
                for ($i = 0; $i < $r; $i++) {
                    for ($j = 0; $j < $c; $j++) {
                        if($tt3[$i][$j]=='-'){
                            $tt3[$i][$j]='EXTRA';
                        }
                    }
                }
            
            
                $count=0;
                $r = count($tt4);
                $c = count($tt4[0]);
                for ($i = 0; $i < $r; $i++) {
                    for ($j = 0; $j < $c; $j++) {
                        if(($tt4[$i][$j]=='-' )){
                            for($x=0;$x<sizeof($sub4);$x++){
                                if($sub4[$x][6]=='LAB' && $sub4[$x][4]>=0){
                                    $tt4[$i][$j]=$sub4[$x][1].'(L)';
                                    
                                    $sub4[$x][4]-=1;
                                    break;
                                }
                            }
                        }
                    }
                }
            
            
            
            $count=11;
            
            while($count>0){
                for ($i = 0; $i < $r; $i++) {
                    for ($j = 0; $j < $c; $j++) {
                        if($tt4[$i][$j]=='-'){
                            $pos = rand(0,sizeof($sub4)-1);
                            
                                if($sub4[$pos][2]>0){
                                    $tt4[$i][$j]=$sub4[$pos][1];
                                    $sub4[$pos][2]--;
                                    $count--;
                                    break;
                                }
                                if($sub4[$pos][3]>0){
                                    $tt4[$i][$j]=$sub4[$pos][1].'(T)';
                                    $sub4[$pos][3]--;
                                    $count--;
                                    break;
                                }
                            
                            
                        }
                    }
                }
            }
            
            
            $r = count($tt5);
                $c = count($tt5[0]);
                for ($i = 0; $i < $r; $i++) {
                    for ($j = 0; $j < $c; $j++) {
                        if(($tt5[$i][$j]=='-' )){
                            for($x=0;$x<sizeof($sub5);$x++){
                                if($sub5[$x][6]=='LAB' && $sub5[$x][4]>0){
                                    $tt5[$i][$j]=$sub5[$x][1].'(L)';
                                    
                                    $sub5[$x][4]-=1;
                                    break;
                                }
                            }
                        }
                    }
                }
            
                $count = 16;
                while($count>0){
                    for ($i = 0; $i < $r; $i++) {
                        for ($j = 0; $j < $c; $j++) {
                            if($tt5[$i][$j]=='-'){
                                $pos = rand(0,sizeof($sub5)-1);
                                
                                    if($sub5[$pos][2]>0){
                                        $tt5[$i][$j]=$sub5[$pos][1];
                                        $sub5[$pos][2]--;
                                        $count--;
                                        break;
                                    }
                                    if($sub5[$pos][3]>0){
                                        $tt5[$i][$j]=$sub5[$pos][1].'(T)';
                                        $sub5[$pos][3]--;
                                        $count--;
                                        break;
                                    }
                                
                                
                            }
                        }
                    }
                }
            
            
                $r = count($tt6);
                $c = count($tt6[0]);
            
                for ($i = 0; $i < $r; $i++) {
                    for ($j = 0; $j < $c; $j++) {
                        if(($tt6[$i][$j]=='-' )){
                            $tt6[$i][$j]=$sub6[0][1].'(L)';
                        }
                    }
                }
        
                // Print the timetable for each day
                echo '<tr>';
                printm($tt1);
                echo '</tr>';
                echo '</table>';
        
                echo '<table>';
                echo'<caption>Btech Second Year</caption>';
           echo' <tr>';
           echo ' <th>Day </th>';
              echo ' <th>9.00-10.00 </th>';
             echo'   <th>10.00-11.00</th>';
              echo'  <th>11.00-12.00</th>';
               echo' <th>13.00-14.00</th>';
               echo' <th>14.00-15.00</th>';
                echo'<th>15.00-16.00</th>';
           echo' </tr>';
        
                echo '<tr>';
                printm($tt2);
                echo '</tr>';
        echo'</table>';
        echo'<table>';
        echo'<caption>Btech Third Year</caption>';
        echo' <tr>';
        echo ' <th>Day </th>';
              echo ' <th>9.00-10.00 </th>';
             echo'   <th>10.00-11.00</th>';
              echo'  <th>11.00-12.00</th>';
               echo' <th>13.00-14.00</th>';
               echo' <th>14.00-15.00</th>';
                echo'<th>15.00-16.00</th>';
           echo' </tr>';
        
                echo '<tr>';
                printm($tt3);
                echo '</tr>';
                echo'</table>';
                echo'<table>';
                echo'<caption>Btech Fourth Year</caption>';
                echo' <tr>';
                echo ' <th>Day </th>';
              echo ' <th>9.00-10.00 </th>';
             echo'   <th>10.00-11.00</th>';
              echo'  <th>11.00-12.00</th>';
               echo' <th>13.00-14.00</th>';
               echo' <th>14.00-15.00</th>';
                echo'<th>15.00-16.00</th>';
           echo' </tr>';
        
                echo '<tr>';
                printm($tt4);
                echo '</tr>';
                echo'</table>';
                echo'<table>';
                echo'<caption>Mtech First Year</caption>';
                echo' <tr>';
                echo ' <th>Day </th>';
              echo ' <th>9.00-10.00 </th>';
             echo'   <th>10.00-11.00</th>';
              echo'  <th>11.00-12.00</th>';
               echo' <th>13.00-14.00</th>';
               echo' <th>14.00-15.00</th>';
                echo'<th>15.00-16.00</th>';
           echo' </tr>';
        
                echo '<tr>';
                printm($tt5);
                echo '</tr>';
                echo'</table>';
                echo'<table>';
                echo'<caption>Mtech Second Year</caption>';
                echo' <tr>';
                echo ' <th>Day </th>';
              echo ' <th>9.00-10.00 </th>';
             echo'   <th>10.00-11.00</th>';
              echo'  <th>11.00-12.00</th>';
               echo' <th>13.00-14.00</th>';
               echo' <th>14.00-15.00</th>';
                echo'<th>15.00-16.00</th>';
           echo' </tr>';
        
                echo '<tr>';
                printm($tt6);
                echo '</tr>';
                echo'</table>';
            ?>
        </table>
    </div>
</body>
</html>
