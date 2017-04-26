<?php
/**
 * Created by PhpStorm.
 * User: 1613692
 * Date: 26/04/2017
 * Time: 13:02
 */
$req = $_GET['query'];
        $request = strtolower($req);
        header('Content-Type: application/json');
        include('db.php');
        if (!empty($request)){
            if(($request=="course")) {
                $query = "SELECT * FROM  course";
                $result = $link->query($query);
                if($result->num_rows()>0) {
                    $arrayIndex= 0;
                    while($single=$result->fetch_assoc()){
                        $dataArray[$arrayIndex]= $single;
                        $arrayIndex++;
                    }
                    $jason=json_encode($dataArray);
                    $jason = indent($jason);
                    echo $jason;
                }else{
                    $jason  = array( "message"=> "No Records Found for Your Query" );
                    echo $jason;
                }
            }elseif(($request == "students")  ){
                $query = "SELECT firstname, lastname, email, address, student_ID FROM  student";
                $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result)>0) {
                    $count= 0;
                    while( $res=  mysqli_fetch_assoc($result)){
                        $prite[$count]=$res;
                        $count++;
                    }
                    $pry=json_encode($prite);
                    $pry = indent($pry);
                    echo $pry;
                }else{
                    $pry  = array( "firstname"=>NULL, "lastname" => NULL,  "email" =>NULL,  "address"=>NULL,  "student_ID"=>NULL, "message"=> "No Records Available");
                    echo $pry;
                }
            }elseif(($req == "staff")){
                $query = "SELECT firstname, lastname, email,role, address, staff_ID FROM  staff";
                $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result)>0) {
                    $count= 0;
                    while( $res=  mysqli_fetch_assoc($result)){
                        $prite[$count]=$res;
                        $count++;
                    }
                    $pry=json_encode($prite);
                    $pry = indent($pry);
                    echo $pry;
                }else{
                    $pry  = array( "firstname"=>NULL, "lastname" => NULL,  "email" =>NULL,  "role"=>NULL,  "address"=>NULL,  "student_ID"=>NULL, "message"=> "No Records Available");
                    echo $pry;
                }
            }
        }else{
        }
function indent($json)
{
    $quo = '';
    $pos = 0;
    $strLen = strlen($json);
    $indentStr = '  ';
    $newLine = "\n";
    $prevChar = '';
    $outOfQuotes = true;
    for ($i = 0; $i <= $strLen; $i++) {
        $char = substr($json, $i, 1);
        if ($char == '"' && $prevChar != '\\') {
            $outOfQuotes = !$outOfQuotes;
        } else if (($char == '}' || $char == ']') && $outOfQuotes) {
            $quo .= $newLine;
            $pos--;
            for ($j = 0; $j < $pos; $j++) {
                $quo .= $indentStr;
            }
        }
        $quo .= $char;
        if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
            $quo .= $newLine;
            if ($char == '{' || $char == '[') {
                $pos++;
            }
            for ($j = 0; $j < $pos; $j++) {
                $quo .= $indentStr;
            }
        }
        $prevChar = $char;
    }
    return $quo;
}