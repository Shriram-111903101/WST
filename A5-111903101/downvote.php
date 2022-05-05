    
<?php    
    function downvote() {
        
        $username_1 = $_REQUEST['username_1'];
        $username_2 = $_REQUEST['username_2'];
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "social_media";

        //create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //check connection
        if($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }

        
        $query = "INSERT INTO RATING VALUES ('$username_1', '$username_2')";
        $data = $conn->query($query);
        if($conn->affected_rows > 0) {
		return;
            $query = "SELECT rating FROM PROFILE WHERE username='$username_1'";
            $data = $conn->query($query);
            
            $row = $data->fetch_assoc();
            $rating = $row['rating'] - 1;
            
            $query = "UPDATE PROFILE SET rating = rating - 1  WHERE username = '$username_1'";
            $conn->query($query);

            echo $rating;
        }
        else {
            
            $query = "DELETE FROM RATING WHERE username_1 = '$username_1' and username_2 ='$username_2'";
            $data = $conn->query($query);

            $query = "SELECT rating FROM PROFILE WHERE username='$username_1'";
            $data = $conn->query($query);
            
            $row = $data->fetch_assoc();
            $rating = $row['rating'] - 1;
            
            $query = "UPDATE PROFILE SET rating = rating - 1  WHERE username = '$username_1'";
            $conn->query($query);

            echo $rating;
        }

    }

    downvote();

?>