<!DOCTYPE html>
<html lang="en">
<head>
  <title>Payout Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3>Payout Details</h3>
  <?php //print_r($data)  ;?>
  
	<table>
		<form name="payoutform" id="payoutform" action ="<?php echo base_url('index.php/lead/save_invoiceDetails'); ?>" method="POST">
		
		<input type="hidden" name="lead_id" value="<?php echo $lead_id ;?>">
		<input type="hidden" name="lead_loan_amount" value="<?php echo $data["lead_loan_amount"] ;?>">

				 
		<div class="row">
			
			<div class="col-sm-3 col-md-6" style="background-color:lightyellow;">
				<div><h4><b> Lead Details</b></h4></div>
				<div><h5>Lead ID= <?php  echo $data["lead_id"]; ?></h5></div>
				<div><h5>First Name=<?php  echo $data["lead_first_name"]; ?></h5></div>
				<div><h5>Last Name=<?php  echo $data["lead_last_name"]; ?></h5></div>
				<div><h5>Email=<?php  echo $data["lead_email"]; ?></h5></div>
				<div><h5>Contact Number=<?php  echo $data["lead_mobile"]; ?></h5></div>
				<div><h5>Location (City) =<?php  echo $data["location_name"]; ?></h5></div>
				<div><h5>Product =<?php  echo $data["product_name"]; ?></h5></div>
				<div><h5>Loan Amount =<?php  echo $data["lead_loan_amount"]; ?></h5></div>
				<div></div>
				<div></div>
			</div>
			<div class="col-sm-3 col-md-6" style="background-color: lightyellow;">
				<div><h4> <b>DSA Details</b></h4></div>
				<div><h5>DSA ID=<?php  echo $data["account_id"];?></h5></div>
				<div><h5>Name=<?php  echo $data["account_firstname"]." ".$data["account_lastname"];?></h5></div>
				<div><h5>Email=<?php  echo $data["account_email"] ;?></h5></div>
				<div><h5>Phone Number=<?php  echo $data["account_mobile"] ;?></h5></div>
				<div><h5>Status=<?php  echo $data["account_status"] ;?></h5></div>
				<div><h5>Registered at=<?php  echo $data["account_created_on"] ;?></h5></div>
				<div><h5>Employee Type=<?php  echo $data["account_emp_type"] ;?></h5></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 col-md-6" style="background-color:lightyellow;">
				<div><h4><b> NRM Details</b></h4></div>
				<?php
			
				
						$dsaId = $data["account_id"];
						$nrmdetails = getNRMDeatilswithnrmmapping($dsaId);
						$nrmId = $nrmdetails["account_id"];
						 $nrmfirstname = $nrmdetails["account_firstname"];
						 $nrmlastname = $nrmdetails["account_lastname"];
						 $account_email = $nrmdetails["account_email"];
						$account_mobile = $nrmdetails["account_mobile"];
						$account_status = $nrmdetails["account_status"];
						//print_r($nrmdetails);
				 ?>
				<div><h5>First Name=<?php  echo $nrmfirstname; ?></h5></div>
				<div><h5>Last Name=<?php  echo $nrmlastname; ?></h5></div>
				<div><h5>Email-ID=<?php  echo $account_email; ?></h5></div>
				<div><h5>Mobile=<?php  echo $account_mobile; ?></h5></div>
				<div><h5>Status=<?php  echo $account_status; ?></h5></div>
				
			</div>
			<div class="col-sm-3 col-md-6" style="background-color: lightyellow;">
				
				<?php
						$leadId =$data["lead_id"];
						$bankdetails = getBankwithblogin($leadId);
						$bankID = $bankdetails["bank_id"];
						$bank_name = $bankdetails["bank_name"];
						//print_r($bankdetails);
						
						$productId =$data["lead_product_id"];
						$bankslab=getBankslabwithblogins($productId, $bankID);
						$slabID =$bankslab["id"];
						$slab = $bankslab["slab"];
						
						//print_r($bankslab);
						
						$totalDisbAmount = $data["lead_loan_amount"];
				 ?>
					 	 <input type="hidden" name="dsa_id" value="<?php echo $dsaId ;?>">
		 <input type="hidden" name="slab_id" value="<?php echo $slabID ;?>">
				<div><h4><b> Bank Details</b></h4></div>
				<div><h5>Disburstment bank name=<?php echo $bank_name ;?></h5></div>
				<div><h5>Bank Slab=Rs. <input type="text" name="slabrate" value="<?php echo $slab;?>">%</h5></div>
				<div><h5>Total Payable Amt= Rs.<?php 
					
					$slapAmt = ( $totalDisbAmount * ($slab/100));
					echo $slapAmt;
				?> </h5></div>
				<div><h5>TDS (10%)=<?php 
						$tdsAmount = ( $totalDisbAmount * (0.01));
						
						echo $tdsAmount;
				?> <!-- <input type="text" name="tdsamount" value="<?php //echo $tdsAmount; ?>"> --> </h5></div>
				<div><h5>GST (18%)=<?php
					
					 $gstAmount = ( $totalDisbAmount * (0.18));
					echo $gstAmount;
				 ?> <!-- <input type="text" name="gstamount" value="<?php //echo $gstAmount; ?>"> --> </h5></div>
				
				Final Payble Amount = Rs. <b><?php 
					
					$totalFianlPay = (( $slapAmt +  $gstAmount) - $tdsAmount );
					//$totalFianlPay;
					echo  $totalFianlPay;
				?></b>
				<br>
				Invoice Date=
				 <input type="text" name="invoice_date" id="invoice_date" value="<?php echo date("Y-m-d"); ?>">
				<div></div>
			</div>
		</div>
		
		<a href="<?php echo base_url('index.php/Lead/leadlist');?>">Back</a>&nbsp
		
				<input type="submit" name="submit" value="Generate Invoice" class="btn-primary">

		</form>
  </table>
</div>
    
</body>
</html>
