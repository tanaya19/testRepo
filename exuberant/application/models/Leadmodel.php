<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leadmodel extends CI_Model {

  function getleads($custname,$limit,$offset){
	 // echo"Tanaya";
		$this->db->select('*');
		$this->db->from('leads');
		if(!empty($custname)){
			$this->db->where("(lead_first_name LIKE '%$custname%' OR lead_last_name LIKE '%$custname%' OR product_name LIKE '%$custname%' 
			OR location_name LIKE '%$custname%' OR lead_mobile LIKE '%$custname%' OR lead_email LIKE '%$custname%') ");
		}
		$this->db->order_by('lead_id desc');
		
		$this->db->join('products', 'leads.lead_product_id = products.product_id', 'inner');
		$this->db->join('locations', 'leads.lead_location_id = locations.location_id', 'inner');
		$this->db->join('accounts', 'leads.lead_generator = accounts.account_id', 'inner');
		$this->db->join('lead_channels', 'leads.lead_channel = lead_channels.channel_id', 'inner');
		$this->db->join('banks', 'leads.lead_bank_name = banks.bank_id', 'inner');
		$this->db->join('blogins', 'leads.lead_id = blogins.blogin_lead', 'inner');
		$this->db->limit($limit,$offset);
		$query = $this->db->get();
	
	//$this->db->join('comments', 'comments.id = articles.id');
	//echo $this->db->last_query();
	return $query->result(); 
}

public function num_rows(){
	
	$this->db->select('lead_id');
		$this->db->from('leads');
		if(!empty($custname)){
			$this->db->where("(lead_first_name LIKE '%$custname%' OR lead_last_name LIKE '%$custname%' OR product_name LIKE '%$custname%' 
			OR location_name LIKE '%$custname%' OR lead_mobile LIKE '%$custname%' lead_email LIKE '%$custname%') ");
		}
		$this->db->order_by('lead_id desc');
	//	$this->db->limit(10);
		$this->db->join('products', 'leads.lead_product_id = products.product_id', 'inner');
		$this->db->join('locations', 'leads.lead_location_id = locations.location_id', 'inner');
		$this->db->join('accounts', 'leads.lead_generator = accounts.account_id', 'inner');
		$query = $this->db->get();
	
	//$this->db->join('comments', 'comments.id = articles.id');
	//echo $this->db->last_query();
	return $query->num_rows(); 
	}
	
	public function viewdetail($lead_id){
    $this->db->select('*');
    $this->db->from('leads');
    $this->db->order_by('lead_id desc');
	//	$this->db->limit(10);
		$this->db->join('products', 'leads.lead_product_id = products.product_id', 'inner');
		$this->db->join('locations', 'leads.lead_location_id = locations.location_id', 'inner');
	//	$this->db->join('accounts', 'leads.lead_generator = accounts.account_id', 'inner');
		$this->db->join('lead_channels', 'leads.lead_channel = lead_channels.channel_id', 'inner');
		$this->db->join('banks', 'leads.lead_bank_name = banks.bank_id', 'inner');
		$this->db->join('accounts', 'leads.lead_dsa = accounts.account_id', 'inner');
    $this->db->where('lead_id', $lead_id );
    $query = $this->db->get();
	//echo $this->db->last_query();
    if ( $query->num_rows() > 0 )
    {
        $row = $query->row_array();
        return $row;
    }
}


public function dsadetails($lead_id){
	$this->db->select('dsa_invoice_master.*');
	$this->db->from('dsa_invoice_detail');
	$this->db->order_by('id desc');
	//	$this->db->limit(10);
		$this->db->join('dsa_invoice_master', 'dsa_invoice_detail.dsa_invoice_master = dsa_invoice_master.id', 'inner');
	$this->db->where('lead_id', $lead_id );
	$query = $this->db->get();
	echo $this->db->last_query();
	if ( $query->num_rows() > 0 )
	{
		$row = $query->row_array();
		return $row;
	}
}


public function getDsaDetails($lead_id){
	
	$this->db->select('dsa_invoice_detail.*');
		$this->db->from('dsa_invoice_detail');
		$this->db->order_by('id desc');
		$this->db->join('dsa_invoice_master', 'dsa_invoice_detail.dsa_master_id = dsa_invoice_master.id', 'inner');
		$this->db->where('lead_id', $lead_id );
		$query = $this->db->get();
	
	//$this->db->join('comments', 'comments.id = articles.id');
	//echo $this->db->last_query();
	return $query->result(); 
	
	
	}

public function updatePayout($lead_id,$display){
		//$this->db->set($display);
		//echo "Tanaya----->>" ;
		$this->db->where('id', $lead_id);
		$this->db->update('dsa_invoice_master',$display);	
	}
	
public function updatePayoutdetails($tabid,$data){

		$this->db->where('id', $tabid);
		$this->db->update('dsa_invoice_detail',$data);	
		return true;
	}
	
public function viewdsainvoicedetail($lead_id){
	 $this->db->from('leads');
    $this->db->order_by('lead_id desc');
	//	$this->db->limit(10);
		$this->db->join('products', 'leads.lead_product_id = products.product_id', 'inner');
		$this->db->join('locations', 'leads.lead_location_id = locations.location_id', 'inner');
	//	$this->db->join('accounts', 'leads.lead_generator = accounts.account_id', 'inner');
		$this->db->join('lead_channels', 'leads.lead_channel = lead_channels.channel_id', 'inner');
		$this->db->join('banks', 'leads.lead_bank_name = banks.bank_id', 'inner');
		$this->db->join('accounts', 'leads.lead_dsa = accounts.account_id', 'inner');
    $this->db->where('lead_id', $lead_id );
    $query = $this->db->get();
	//echo $this->db->last_query();
    if ( $query->num_rows() > 0 )
    {
        $row = $query->row_array();
        return $row;
    }
}
	
	public function addIntoDSAMaster($display){
		
		$this->db->insert('dsa_invoice_master',$display);
		//echo $this->db->last_query();exit();
		return $this->db->insert_id();
	}
    
    public function addIntoDSAMasterDetails($data) {
			$this->db->insert('dsa_invoice_detail',$data);
		
		//echo $this->db->last_query();exit();
		return $this->db->insert_id();
	}
	
	public function leadDeatils($leadId) {
		
	$this->db->select('*');
	$this->db->from('leads');
	$this->db->where('lead_id', $leadId );
	$query = $this->db->get();
	//echo $this->db->last_query();
	if ( $query->num_rows() > 0 )
	{
		$row = $query->row_array();
		return $row;
	}
}
	
	public function updateInvoicePaid($tabid,$updateInvoicePaid){

		$this->db->where('id', $tabid);
		$this->db->update('dsa_invoice_detail',$updateInvoicePaid);	
		echo $this->db->last_query();
		return true;
	}
	
	
}
