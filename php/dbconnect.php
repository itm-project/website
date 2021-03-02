
<?php

function connectDB(){

	$servername = "localhost";
	$username = "root";
	$password = "";

	// $servername = "localhost";
	// $username = "root";
	// $password = "";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=itmproject;charset=utf8", $username, $password);

    		// $conn = new PDO("mysql:host=$servername;dbname=palmWeb2561;charset=utf8", $username, $password);
    		// set the PDO error mode to exception
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//$conn->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);
    		//echo "Connected successfully";
		return $conn; 
	}
	catch(PDOException $e){
    		return "Connection failed: " . $e->getMessage();
	}
}

function selectData( $str ){

	$myConDB = connectDB();

	try {
    		$stmt = $myConDB->prepare( $str ); 
    		$stmt->execute();

		$num = 0;
		while( $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
			$num++;
    			foreach($result as $key => $value) {
        			//echo $key . "-----" . $value . "<br/>";
				$data[$num][$key] = $value;
    			}
		}
		$data[0]['numrow'] = $num;
		$conn = null;
		return $data;

	}
	catch(PDOException $e) {
		$conn = null;
    		return "Error: " . $e->getMessage();
	}
	
	//$conn = null;
}

function selectDataOne ( $str ){
	$myConDB = connectDB();

        try {
                $stmt = $myConDB->prepare( $str );
                $stmt->execute();

                $num = 0;
                if( $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
                        foreach($result as $key => $value) {
                                //echo $key . "-----" . $value . "<br/>";
                                $data[$key] = $value;
                        }
                }
		$conn = null;
                return $data;

        }
        catch(PDOException $e) {
		$conn = null;
                return "Error: " . $e->getMessage();
        }

        //$conn = null;
}

function selectDataArray( $str ){

	$myConDB = connectDB();

	try {
    		$stmt = $myConDB->prepare( $str ); 
		$stmt->execute();
		    
		$bucket = "";

		while( $result = $stmt->fetch(PDO::FETCH_ASSOC) ){

			$set = "";
    			foreach($result as $key => $value) {
				$set .= "\"".$key."\":\"".$value."\",";
			    }

			$set = rtrim($set,',');
			$bucket .= "{".$set."},";
		}
		$bucket = rtrim($bucket,',');
		
		$resultJson = "[".$bucket."]";

		$conn = null;
		return $resultJson;

	}
	catch(PDOException $e) {
		$conn = null;
    		return "Error: " . $e->getMessage();
	}
	
	//$conn = null;
}


function updateData( $str ){
	$myConDB = connectDB();
	
	try {
                $stmt = $myConDB->prepare( $str );
                $stmt->execute();

		$conn = null;
                return "OK";

        }
        catch(PDOException $e) {
		$conn = null;
                return "Error: " . $e->getMessage();
        }
}

function addinsertData( $str ){
	$myConDB = connectDB();
	
	try {
                $stmt = $myConDB->prepare( $str );
                $stmt->execute();

		$conn = null;
                return $myConDB->lastInsertId();

        }
        catch(PDOException $e) {
		$conn = null;
                return "Error: " . $e->getMessage();
        }
}


?>

