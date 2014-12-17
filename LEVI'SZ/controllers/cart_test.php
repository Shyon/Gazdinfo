<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_test extends CI_Controller 
{
	function add() 
	{	
		$data=array(
			'id' => '1',
			'name' => 'apolo1',
			'qty' => 1,
			'price' => 1200
		);
		
		$this->cart->insert($data);
		echo "add() called";
	}
	
	function show() {
	$cart=$this->cart->contents();
	echo "<pre>";
	print_r($cart);
	echo "show() called";
	}
	
	function add2() {
	
	$data=array(
		'id' => '2',
		'name' => 'bpolo2',
		'qty' =>2,
		'price' =>1000
		);
		
	$this->cart->insert($data);
	echo "add2() called";
	}
	
	function update() {
	$data = array(
		'id'=>'1'
		);
		
	$this->cart->update($data);
	echo "update() called";
	}
	
	function total() 
	{
		echo $this->cart->total();
	}
	
	function remove() 
	{
		$data = array(
		'id' => '1'
		);
	 
	 $this->cart->update($data);
	}
	
	function destroy() {
	$this->cart->destroy();
	}
	
	
	
	
	
	
	
	
}
?>