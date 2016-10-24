<?php 
		$vipn = 1;
		foreach ($_POST as $Nombres) {
			$item_number =$Nombres['item_number'.$vipn.''];
			$item_name =$Nombres['item_name'.$vipn.''];
			$item_txn_id =$Nombres['item_txn_id'.$vipn.''];



			if (isset($item_name,$item_name,$item_txn_id)) {
				#echo $item_name."valor:".$value."-----".$item_number."valor:".$value."----".$item_txn_id."valor:".$value."</br>";
				print_r("Producto:".$_POST['item_number'.$vipn]."Cantidad:".$_POST['item_name'.$vipn]."Id Transacción:".$_POST['item_txn_id'.$vipn]);
				#var_dump($_POST['item_number'.$vipn]);
			}else{
				echo "sin variable post";
			}
			$vipn++;
		}

?>