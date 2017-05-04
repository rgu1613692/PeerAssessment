<?php
/**
 * Created by PhpStorm.
 * User: 1613692
 * Date: 26/04/2017
 * Time: 13:02
 */

var_dump($_SERVER['PATH_INFO']);
$url = explode ("/", substr($_SERVER['PATH_INFO'], 1));

print_r($url);

header('Content-Type: application/json');
include('db.php');
if (true) {
    if (($url[0] == "course")) {
        //going to this url will return all course in the db http://myassessment.azurewebsites.net/endpoint.php?query=course
        $query = "SELECT * FROM course";
        $result = $link->query($query);
        if ($result->num_rows > 0) {
            $arrayIndex = 0;
            while ($single = $result->fetch_assoc()) {
                $dataArray[$arrayIndex] = $single;
                $arrayIndex++;
            }
            $jason = json_encode($dataArray);
            $jason = indent($jason);
            echo $jason;
        } else {
            $jason = array("message" => "No Records Found for Your Query");
            echo $jason;
        }
    } elseif (($request == "users")) {
        //going to this url will return all users in the db http://myassessment.azurewebsites.net/endpoint.php?query=users
        $query = "SELECT userid, username, email FROM users";
        $result = $link->query($query);
        if ($result->num_rows > 0) {
            $arrayIndex = 0;
            while ($single = $result->fetch_assoc()) {
                $dataArray[$arrayIndex] = $single;
                $arrayIndex++;
            }
            $jason = json_encode($dataArray);
            $jason = indent($jason);
            echo $jason;
        } else {
            $jason = array("message" => "No Records Found for Your Query");
            echo $jason;
        }
    } elseif (($request == "task")) {
        //going to this url will return all tasks in the db http://myassessment.azurewebsites.net/endpoint.php?query=task
        $query = "SELECT * FROM task";
        $result = $link->query($query);
        if ($result->num_rows > 0) {
            $arrayIndex = 0;
            while ($single = $result->fetch_assoc()) {
                $dataArray[$arrayIndex] = $single;
                $arrayIndex++;
            }
            $jason = json_encode($dataArray);
            $jason = indent($jason);
            echo $jason;
        } else {
            $jason = array("message" => "No Records Found for Your Query");
            echo $jason;
        }
    }
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