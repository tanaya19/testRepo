<?php


function selectDropDown($tableName, $fieldName='*',$selectId='id',$class='', $selectValue='') {
	 $ci = & get_instance();
	$ci->db->select($fieldName);
	$query = $ci->db->get($tableName);
	 $string = '';
	 //echo $ci->db->last_query(); exit;
	 if (($query)) {
		 $string .= '<select name="'.$selectId.'" id="'.$selectId.'" class="'.$class.'">';
		 $totRows = $query->num_rows();
		 if($totRows) {
			 $string .= '<option value="">Select '.$selectId.'</option>';
		 $dataArray = $query->result_array();
		 foreach($dataArray as $values) {
			$id = trim($values["id"]);
			$name = $values["name"];
			$selectedName = '';
			$selectedName = (strtolower($id) == strtolower($selectValue)) ? 'selected' : '';
			$string .= '<option value="'.$id.'" '.$selectedName.'>'.$name.'</option>';
		 } 
	 } else {
		 $string .= '<option value="">No records</option>';
	 }
		$string .= '</select>';
		return  $string;
	} else {
		throw new Exception("Database connection failed");
	}
}

function getsinglerecorddetailwithid($tablename, $tabid=0) {
	
	$ci = & get_instance();
	
	$sql = "select * from $tablename where id =  ".$tabid;
	$query = $ci->db->query($sql);
	$totRows = $query->num_rows();
	if($totRows) {
		$data = $query->row_array();
		return $data;
	} else {
		return false;
	}
}

function getNRMDeatilswithnrmmapping($dsaId) {
	$ci = & get_instance();

	$sql = "select a.account_id,  a.account_username, a.account_firstname, a.account_lastname, a.account_email, a.account_mobile, a.account_status FROM accounts a 
	INNER JOIN nrm_mapping b ON (a.account_id = b.nrm_acc_id) 
	WHERE b.nrm_dsa_id = '".$dsaId."' ";

	$query = $ci->db->query($sql);
	
	$totRows = $query->num_rows();
	if($totRows) {
		$data = $query->row_array();
		return $data;
	} else {
		return false;
	}
}

function getBankwithblogin($leadId){    
	$ci = & get_instance();
	$sql = "select a.bank_id, a.bank_name, a.bank_status FROM banks a 
	INNER JOIN blogins b ON (a.bank_id = b.blogin_bank) 
	WHERE b.blogin_lead = '".$leadId."' ";
	//echo $sql;
	$query = $ci->db->query($sql);
	
	$totRows = $query->num_rows();
	if($totRows) {
		$data = $query->row_array();
		return $data;
	} else {
		return false;
	}
}

function getBankslabwithblogins($productId, $slabID){    
	$ci = & get_instance();
	$sql = "select a.id, a.bankid,a.slab, a.status FROM bank_slab a  where a.status = 'Active' AND a.bankid ='".$slabID."' AND a.product_id ='".$productId."'";
	$query = $ci->db->query($sql);
	//echo $sql;
	$totRows = $query->num_rows();
	if($totRows) {
		$data = $query->row_array();
		return $data;
	} else {
		return false;
	}
}

function checkDSAexitornot($DSAID, $leadId){
	
	$ci = & get_instance();
	
	$sql = "select * from dsa_invoice where dsa_id =  ".$DSAID." AND lead_id = ".$leadId;
	$query = $ci->db->query($sql);
	
	$totRows = $query->num_rows();
	if($totRows) {
		$data = $query->row_array();
		return $data;
	} else {
		return false;
	}
}

function CHECKdsaExitance($lead_id){
	$ci = & get_instance();
	
	$sql = "select * from dsa_invoice_detail where lead_id =  ".$lead_id;
	$query = $ci->db->query($sql);
	 
	$totRows = $query->num_rows();
	if($totRows) {
		$data = $query->row_array();
		return $data;
	} else {
		return false;
	}
}

function getDsaInvoice($DSAID,$invoiceID){
	$ci = & get_instance();
	
	$sql = "select a.id, a.dsa_id, a.slab_id, a.total_dist_amt, a.gst_amt, a.final_amt, a.tds_amt, a.invoice_no, a.invoice_date, b.id as invoice_detail_id, b.slab_rate, b.lead_id, b.invoice_paid FROM dsa_invoice_master a inner join dsa_invoice_detail b on (a.id = b.dsa_master_id)  where a.dsa_id =  ".$DSAID." AND a.id=".$invoiceID." AND invoice_paid = 0";
	$query = $ci->db->query($sql);
	
	$totRows = $query->num_rows();
	if($totRows) {
		$data = $query->row_array();
		return $data;
	} else {
		return false;
	}
}



