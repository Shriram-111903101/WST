<?php


$question = $_POST["question"];
$a = $_POST["a"];
$b = $_POST["b"];
$c = $_POST["c"];
$d = $_POST["d"];
$answer = $_POST["answer"];
		

		$stat = 0;
		if(array_key_exists('button1', $_POST)) {
            button1();
        }
        else if(array_key_exists('button2', $_POST)) {
            button2();
        }
        function button1() {
            $stat = 1;
        }
        function button2() {
            $stat = 0;
        }

        $db = new mysqli('localhost', 'root', '', 'quiz','3306');
        $sql = "select count(*) from qbank where question = '$question' and a = '$a' and b = '$b' and c = '$c' and d = '$d';";
        $result = mysqli_query($db,$sql);
 		$row = mysqli_fetch_array($result);
 		if($row[0] >= 1){
 			{
 			echo 	"<SCRIPT>alert('Question added already');</SCRIPT>";
 			}
 		}
 		else if($stat === 0){
 			 $sql = "insert into qbank (question, a, b,  c,  d, answer) values ('$question', '$a', '$b',  '$c',  '$d' , '$answer');";
        	$result = mysqli_query($db,$sql);
 		//	$row = mysqli_fetch_array($result);
        	echo "Inserted";
 		}
 		else if($stat === 1){
 			$sql = "delete from qbank where question = '$question';";
        	$result = mysqli_query($db,$sql);
        	echo "deleted";
 		}


header("Location: makequiz.html");


?>