<?php
	//create database
	$servername = "localhost";
	$username = "spriha";
	$password = "mindfire";
	try {
	    $conn = new PDO("mysql:host=$servername", $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $sql = "CREATE DATABASE IF NOT EXISTS test_db";
	    $conn->exec($sql);
	    echo "Database created successfully<br>";
    }
	catch(PDOException $e)
	    {
	    echo $sql . "<br>" . $e->getMessage();
	    }

	

	//create table
	$conn = new PDO("mysql:host=$servername;dbname=test_db", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE TABLE IF NOT EXISTS customers (
			c_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			firstname VARCHAR(20),
			lastname VARCHAR(20),
			email VARCHAR(50) NOT NULL UNIQUE
		)";
	$conn->exec($sql);
	$sql = "CREATE TABLE IF NOT EXISTS orders (
			o_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			order_date DATE,
			amount VARCHAR(20),
			customer_id INT(6) UNSIGNED,
			CONSTRAINT testkey1 FOREIGN KEY (customer_id)
   			REFERENCES customers(c_id)

		)";
	$conn->exec($sql);
	echo "Tables created";

	$sql = "ALTER TABLE orders MODIFY amount FLOAT";
	$conn->exec($sql);
	echo "Table modified";
	echo "<br><br>";
	//insert data
	// $conn = new PDO("mysql:host=$servername;dbname=test_db", $username, $password);
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	/*$sql = "INSERT INTO customers (firstname, lastname, email)
    VALUES ('Spriha', 'shrivastav', 'spriha@mindfiresolutions.com')";
    $conn->exec($sql);
    echo "New record created successfully";
   */
 //    function generateRandomString($length = 10) {
	//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	//     $charactersLength = strlen($characters);
	//     //$randomString = '';
	//     $counter = 0;
	//     //firstname
	//     for ($i = 0; $i < $length; $i++) {
	//         $randomString[$counter] .= $characters[rand(0, $charactersLength - 1)];
	//     }
	//     //lastname
	//     $counter++;
	//     for ($i = 0; $i < $length; $i++) {
	//         $randomString[$counter] .= $characters[rand(0, $charactersLength - 1)];
	//     }
	//     //email
	//     $counter++;
	//     for ($i = 0; $i < $length; $i++) {
	//         $randomString[$counter] .= $characters[rand(0, $charactersLength - 1)];
	//     }
	//     $randomString[$counter] .= "@gmail.com";

	//     // echo $randomString[0]."<br>";
	//     // echo $randomString[1]."<br>";
	//     // echo $randomString[2]."<br>";

	//     return $randomString;
	// }

    
    for ($i=0; $i < 10000; $i++) { 
    
   	// $randomString = generateRandomString();
   	//print_r($randomString);

	   	$sql = "INSERT INTO customers (firstname, lastname, email)
	    			VALUES ('" . uniqid() . "', '". uniqid() ."', '". uniqid()."@gmail.com')";
	    $conn->exec($sql);

	    //$date = '2019-06-13';
	    $amount = rand();
	    $customer_id = $conn->lastInsertId();

	    $sql = "INSERT INTO orders VALUES (null, '" . date("Y-m-d",time()) . "', '". $amount ."', '".$customer_id."')";
	    $conn->exec($sql);

    }
    echo "New record created successfully";
    echo date("Y-m-d",time());







    //joins
   /* $sql = $conn->prepare("SELECT firstname, lastname, order_date, amount FROM customers c INNER JOIN orders o ON c.c_id = o.customer_id");
    $sql->execute();
    $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
    $result = $sql->fetchAll();
    echo "<br><br>";
    // if ($result->num_rows > 0) {
	    echo "<table><tr><th>Name</th><th>Amount</th></tr>";
	    foreach ($result as $key => $value) {
	     	echo "<tr><td>" . $value["firstname"]. "</td><td>" . $value["amount"]. "</td></tr>";
	     } 
    // }
    echo "</table>";
	// } else {
	   // echo "0 results";
	// }
    //echo "select successfull";
*/
?>
