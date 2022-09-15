<?php

switch ($action) {

	case 'home':

	break;

	case 'login':
		$response = "ok";
		$stmt = $pdo->query('SELECT * FROM User');
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        	if($row["Name"]==$_POST['id'])
            	$user = $row;
        }
        if(!isset($user))
        	$response = "block";
        
		echo json_encode($response);
	break;

	case 'Select':

		$id = $parameters["id"];
		$stmt = $pdo->query('SELECT * FROM User');
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        	if($row["Name"]==$id)
            	$user = $row;
        }
        
        if(!isset($user))
        	header("Location: /");

        $stmt = $pdo->query('SELECT * FROM Products');
        $pr = "";
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        	if($row["IDP"]==$parameters["selectedId"])
        		$pr = $row;
        }

        // LISTA PER IL CENTRALE
        $stmt = $pdo->prepare('SELECT * FROM Link WHERE IDP_1 = :id OR IDP_2 = :id');
        $stmt->execute([':id' => $pr["IDP"]]);
        $listID = array();
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        	if($row["IDP_1"] == $pr["IDP"] )
        		$listID[] = $row["IDP_2"];
        	if($row["IDP_2"] == $pr["IDP"] )
        		$listID[] = $row["IDP_1"];
        }

        $list = array();
        foreach ($listID as $key => $value) {
	        $stmt = $pdo->prepare('SELECT * FROM Products WHERE IDP = :id');
	        $stmt->execute([':id' => $value]);
	        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
	        	$list[] = $row;
	        }
        }

        // LISTA PER DESTRA

        $stmt = $pdo->prepare('SELECT *
                                       FROM Products JOIN Products_User ON Products.IDP = Products_User.IDP
                                      WHERE Products_User.IDU = :id ORDER BY Products_User.Score DESC;');

        $stmt->execute([':id' => $user["ID_U"]]);
        $listRec = array();
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $check = true;
            foreach ($list as $key => $value) {
                if($row["IDP"]==$value["IDP"])
                    $check = false;
            }
            if($check && $row["IDP"]!=$parameters["selectedId"])
                $listRec[] = $row;
        }
        
	break;

	case 'Show':

		$id = $parameters["id"];
		$stmt = $pdo->query('SELECT * FROM User');
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        	if($row["Name"]==$id)
            	$user = $row;
        }
        
        if(!isset($user))
        	header("Location: /");

        $prArray = explode("&&", $parameters["selectedId"]);
        $stmt = $pdo->query('SELECT * FROM Products');
        $list = array();
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        	if(in_array($row["IDP"], $prArray))
        		$list[] = $row;
        }
        $back = (explode("&&", $parameters["selectedId"]))[0];
        
	break;

	case 'RecommendedCloth':

		$id = $parameters["id"];
		$stmt = $pdo->query('SELECT * FROM User');
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        	if($row["Name"]==$id)
            	$user = $row;
        }
        
        if(!isset($user))
        	header("Location: /");

        $stmt = $pdo->prepare('SELECT *
                                       FROM Products JOIN Products_User ON Products.IDP = Products_User.IDP
                                      WHERE Products_User.IDU = :id ORDER BY Products_User.Score DESC;');

        $stmt->execute([':id' => $user["ID_U"]]);
        $list = array();
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        	$list[] = $row;
        }
        
	break;

	case 'get-face':
		$stmt = $pdo->query('SELECT * FROM User');
        $face = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $face[] = $row;
        }
		echo json_encode($face);
	break;

	default:
		
		break;
}

?>