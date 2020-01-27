<?php
include_once("setting.php");
 $transaction_id = $_GET['transaction_id'];
 $password = $_GET['password'];
 $amount = $_GET['amount'];
 $status = $_GET['status'];

 if( $status == 1 )
 {
	 if($amount == 50)
	 {
		 $cash = true_50;
	 }
	 else if($amount == 90)
	 {
		 $cash = true_90;
	 }
	 else if($amount == 150)
	 {
		 $cash = true_150;
	 }
	 else if($amount == 300)
	 {
		 $cash = true_300;
	 }
	 else if($amount == 500)
	 {
		 $cash = true_500;
	 }
	 else if($amount == 1000)
	 {
		 $cash = true_1000;
	 }
 // TRUEMONEY
 $top_sql = $sql->prepare("SELECT TOP 1 * FROM C9Web.dbo.truemoney WHERE password = :pw");
 $top_sql->BindParam(":pw",$password);
 $top_sql->execute();
 $top = $top_sql->fetch(PDO::FETCH_ASSOC);
 if(empty($top['user_no'])) die('ERROR|INVALID_USER_NO');
 
 $card_sql = $sql->prepare("UPDATE C9Web.dbo.truemoney SET status = :status, amount = :amount WHERE card_id = :id");
 $card_sql->BindParam(":status",$status);
 $card_sql->BindParam(":amount",$amount);
 $card_sql->BindParam(":id",$top['card_id']);
 $card_sql->execute();
 
 if($amount > 0)
 {
	 // GET CASH
	 $cash_sql = $sql->prepare("SELECT * FROM C9Unity.Auth.TblAccount WHERE cAccNo = :no");
	 $cash_sql->BindParam(":no",$top['user_no']);
	 $cash_sql->execute();
	 $getcash = $cash_sql->fetch(PDO::FETCH_ASSOC);
	 $update_cash = $getcash['cash']+$cash;
	 $upcash_sql = $sql->prepare("UPDATE C9Unity.dbo.TblAccount SET cPoint = :cash WHERE cAccNo = :account");
	 $upcash_sql->BindParam(":cash",$update_cash);
	 $upcash_sql->BindParam(":account",$top['user_no']);
	 $upcash_sql->execute();
 }
 die('SUCCEED|TOPPED_UP_THB_' . $amount . '_TO_' . $user_id_refill);
 }
 else
 {
 /* ไม่สามารถเติมเงินได ้ */
 die('ERROR|ANY_REASONS');
 }
?>