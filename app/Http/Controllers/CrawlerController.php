<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sunra\PhpSimple\HtmlDomParser;
use App\SellerInfo;

class CrawlerController extends Controller
{
    public function index(Request $request){
    	
    	// Create DOM from URL
		$html = HtmlDomParser::file_get_html($request['url']);
		
		
		$product = array();

		$sellerDetails = $html->find('table#lblue',2);
		$prizeDetails = $html->find('table#lblue',3);
		$array = array();
		$array = explode('(', $sellerDetails->children(1)->children(1)->plaintext);
		$product['name'] = $seller_name = $array[0];

		$variable1 = trim($sellerDetails->children(4)->children(0)->plaintext);
		$variable2 = trim($sellerDetails->children(5)->children(0)->plaintext);
		$variable3 = trim($sellerDetails->children(6)->children(0)->plaintext);
		if($variable1 == 'Phone:'){
			$product['phone'] = $phone = $sellerDetails->children(4)->children(1)->plaintext;
		}elseif($variable1 == 'Location:'){
			$product['location'] = $location = $sellerDetails->children(4)->children(1)->plaintext;
		}elseif($variable2 == 'Mobile Phone:'){
			$mobile = $sellerDetails->children(4)->children(1)->innertext;
			$array = explode('&nbsp', $mobile);
			$product['mobile'] = $mobile= $array[0];
			
		}else{}
		

		if($variable2 == 'Phone:'){
			$product['phone'] = $phone = $sellerDetails->children(5)->children(1)->plaintext;
		}elseif($variable2 == 'Location:'){
			$product['location'] = $location = $sellerDetails->children(5)->children(1)->plaintext;
		}elseif($variable2 == 'Mobile Phone:'){
			$mobile = $sellerDetails->children(5)->children(1)->innertext;
			$array = explode('&nbsp', $mobile);
			$product['mobile'] = $mobile= $array[0];
			
		}else{}

		if($variable3 == 'Phone:'){
			$product['phone'] = $phone = $sellerDetails->children(6)->children(1)->plaintext;
		}elseif($variable3 == 'Location:'){
			$product['location'] = $location = $sellerDetails->children(6)->children(1)->plaintext;
		}elseif($variable3 == 'Mobile Phone:'){
			$mobile = $sellerDetails->children(6)->children(1)->innertext;
			$array = explode('&nbsp', $mobile);
			$product['mobile'] = $mobile= $array[0];
			
		}else{}


		
		
		$product['title'] = $product_title = $html->find('span.title',0)->plaintext;
		$product['image'] = $product_image = $html->find('ul.bxslider',0)->children(0)->children(0)->find('img',0)->src;
		$product['prize'] = $prize = $prizeDetails->children(2)->children(1)->plaintext;
		$product['negotiable'] = $negotiable = $prizeDetails->children(3)->children(1)->plaintext;
		$product['condition'] = $condition = $prizeDetails->children(4)->children(1)->plaintext;
		/*echo 'Product Title : ' . $product_title;
		echo '<br/><br/>Seller Name : ' . $seller_name;
		echo '<br/><br/>Seller Phone: ' . $phone;
		echo '<br/><br/>Address: ' . $locaton;
		echo '<br/><br/>Mobile: ' . $mobile;
		echo "<br/><br/>Prize: " . $prize;
		echo "<br/><br/>Negotiable: " . $negotiable;
		echo "<br/><br/>Condition: " . $condition;
		echo "<br/><br/>";
		echo $product_image;*/
		echo "<pre>";
		print_r($product);
		echo "</pre>";
		
		//return view('index',compact('product'));

	}
	public function featured(){
		
		$infos = array();
		$html = HtmlDomParser::file_get_html('http://hamrobazaar.com/');
		foreach (($html->find("div.anyClass ul li")) as $value) {
			foreach (($value->find('tr')) as $tr) {
				$link =$tr->children(0)->children(1)->href;
				$html = HtmlDomParser::file_get_html('http://hamrobazaar.com/'.$link);

				$sellerDetails = $html->find('table#lblue',2);
				$prizeDetails = $html->find('table#lblue',3);
				

				$infos['location'] = '';
				$infos['seller_phone'] = '';
				$infos['seller_mobile'] = '';
				
				
				$variable1 = trim($sellerDetails->children(4)->children(0)->plaintext);
				$variable2 = trim($sellerDetails->children(5)->children(0)->plaintext);
				$variable3 = trim($sellerDetails->children(6)->children(0)->plaintext);



				if($variable1 == 'Phone:'){
					$infos['seller_phone'] = $phone = $sellerDetails->children(4)->children(1)->plaintext;
				}elseif($variable1 == 'Location:'){
					$infos['location'] = $location = $sellerDetails->children(4)->children(1)->plaintext;
				}elseif($variable1 == 'Mobile Phone:'){
					$mobile = $sellerDetails->children(4)->children(1)->innertext;
					$array = explode('&nbsp', $mobile);
					$infos['seller_mobile'] = $mobile= $array[0];
					
				}else{}
				

				if($variable2 == 'Phone:'){
					$infos['seller_phone'] = $phone = $sellerDetails->children(5)->children(1)->plaintext;
				}elseif($variable2 == 'Location:'){
					$infos['location'] = $location = $sellerDetails->children(5)->children(1)->plaintext;
				}elseif($variable2 == 'Mobile Phone:'){
					$mobile = $sellerDetails->children(5)->children(1)->innertext;
					$array = explode('&nbsp', $mobile);
					$infos['seller_mobile'] = $mobile= $array[0];
					
				}else{}

				if($variable3 == 'Phone:'){
					$infos['seller_phone'] = $phone = $sellerDetails->children(6)->children(1)->plaintext;
				}elseif($variable3 == 'Location:'){
					$infos['location'] = $location = $sellerDetails->children(6)->children(1)->plaintext;
				}elseif($variable3 == 'Mobile Phone:'){
					$mobile = $sellerDetails->children(6)->children(1)->innertext;
					$array = explode('&nbsp', $mobile);
					$infos['seller_mobile'] = $mobile= $array[0];
					
				}else{}




				$array1 = array();
				$array1 = explode('(', $sellerDetails->children(1)->children(1)->plaintext);
				$mobile = $sellerDetails->children(6)->children(1)->innertext;
				$array = explode('&nbsp', $mobile);
				$infos['seller_name'] = $seller_name = $array1[0];
				$infos['product_name']=$product_title = $html->find('span.title',0)->plaintext;
				$infos['product_image']=$product_image = $html->find('ul.bxslider',0)->children(0)->children(0)->find('img',0)->src;
				$infos['product_prize']=$prize = $prizeDetails->children(2)->children(1)->plaintext;
				$infos['negotiable']=$negotiable = $prizeDetails->children(3)->children(1)->plaintext;
				$infos['condition']=$condition = $prizeDetails->children(4)->children(1)->plaintext;

				/*echo 'Product Title : ' . $product_title;
				echo '<br/><br/>Seller Name : ' . $seller_name;
				echo '<br/><br/>Seller Phone: ' . $infos['seller_phone'];
				echo '<br/><br/>Address: ' . $infos['location'];
				echo '<br/><br/>Mobile: ' . $infos['seller_mobile'];
				echo "<br/><br/>Prize: " . $prize;
				echo "<br/><br/>Negotiable: " . $negotiable;
				echo "<br/><br/>Condition: " . $condition;
				echo "<br/><br/>";
				echo '<img src="'. $product_image .'">';
				echo "<br/><br/>";*/
				/*echo "<pre>";
				print_r($infos);
				echo "</pre>";*/

				$infos_from_db = SellerInfo::all();
				//return $infos_from_db;
				$flag = 1;
				if(count($infos_from_db)>0){
					foreach ($infos_from_db as $info) {
						if($info['seller_name']==$infos['seller_name']){
							$flag = 0;
						}
					}
					if($flag){
						SellerInfo::create($infos);
					}
				}else{
					SellerInfo::create($infos);
				}
		
			}
		}
		$infos_from_db = SellerInfo::all();
		return view('show-info',compact('infos_from_db'));
	}
}
