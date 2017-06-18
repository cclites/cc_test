<?php

    namespace App\Http\Controllers;
	use Request;
	use DB;
	use Log;
	use Auth;
	

	class BidController extends Controller{
		
		
		public function post(){
			
			$name = Request::input("name");
			$quantity = Request::input("quantity");
			$price = Request::input("price");
			
            $submitted = date("Y-m-d H:i:s");
			
			$data = json_encode(array('name'=>$name, 'quantity'=>$quantity, 'price'=>$price, 'submitted'=>$submitted));
			
			return $this->writeOut($data);

		}
		
		public function writeOut($json){
			
			//read in file
			$path = '/cc_test/public/data.json';  //should be in the .env file
			$file = file_get_contents($path);
			$file += $json;
			$result = file_put_contents($file, $path);
			
			return json_encode(array('result'=>$result));
		}
		
		public function fetch(){
			
			$path = '/cc_test/public/data.json';
			$file = file_get_contents($path);
			
			return json_encode(array('file'=>$file));
			
		}
		
	}