<?php
/**
 * Created by PhpStorm.
 * User: 1613692
 * Date: 26/04/2017
 * Time: 13:02
 */



$method = $_SERVER['REQUEST_METHOD'];
$requ = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
$requ = array_map('strtolower', $requ);
 print_r($requ);

include('db.php');
if ($method=='GET') {
    if ($requ[0] == "course") {
        header('Content-Type: application/json');
        //going to this url will return all course in the db http://myassessment.azurewebsites.net/endpoint.php/course
        $query = "SELECT * FROM course";
        $result = $link->query($query);
        if ($result->num_rows > 0) {
            $arrayIndex = 0;
            while ($single = $result->fetch_assoc()) {
                $dataArray[$arrayIndex] = $single;
                $arrayIndex++;
            }
            $jason = json_encode($dataArray);
            echo $jason;
        }
    } elseif ((empty($requ[0]))||(sizeof($requ)>1)) {
        echo 'Please provide the correct parameter in the URL';
    }
 elseif ($requ[0]!= "course") {
        echo 'Please the parameter must end with /course';
    }
}
if ($method=='POST') {
        header('Content-Type: application/text');
        //going to this url will create a new course in the db http://myassessment.azurewebsites.net/endpoint.php/course/coursecode/coursename
        if (sizeof($requ) == 3) {
            if ($requ[0] == "course"){
                $query ="INSERT INTO course(code,coursename)VALUES('$requ[1]','$requ[2]')";
                $result = $link->query($query);
                if ($result) {
                    header("HTTP/1.1 200 OK");
                    echo 'success';
                    }else{
                    echo "something went wrong make sure your content is unique";
                    }
                }

            }
        elseif (sizeof($requ) !=3){
            echo 'Please provide the required parameters in the URL in the format /course/coursecode/coursename';
        }
}
if ($method=='PUT') {
    header('Content-Type: application/text');
    //going to this url will update a course in the db with the given course id http://myassessment.azurewebsites.net/endpoint.php/course/courseid/coursecode/coursename
    if (sizeof($requ) == 4) {
        if ($requ[0] == "course"){
            $query ="UPDATE course SET coursename='$requ[3]',code='$requ[2]' WHERE courseid='$requ[1]'";
            $result = $link->query($query);
            if ($result) {
                header("HTTP/1.1 200 OK");
                echo 'success';
            }else{
                echo "something went wrong make sure your content is unique";
            }
        }

    }
    elseif (sizeof($requ) !=3){
        echo 'Please provide the required parameters in the URL in the format /course/coursecode/coursename';
    }
}
if ($method=='DELETE') {
    header('Content-Type: application/text');
    //going to this url will delete a  course in the db with the given course id  http://myassessment.azurewebsites.net/endpoint.php/course/courseid
    if (sizeof($requ) == 4) {
        if ($requ[0] == "course"){

            $query ="DELETE FROM course WHERE courseid ='$requ[1]'";
            $result = $link->query($query);
            if ($result) {
                header("HTTP/1.1 200 OK");
                echo 'success';
            }else{
                echo "something went wrong make sure your content is unique";
            }
        }

    }
    elseif (sizeof($requ) !=3){
        echo 'Please provide the required parameters in the URL in the format /course/coursecode/coursename';
    }
}
