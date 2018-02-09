<?php
//Factory Method (фабричный метод)
abstract class ApptEncoder{
	abstract function encode();
}

class BloggsApptEncoder extends ApptEncoder{
	function encode(){
		return "Данные о встрече закодированы в формате BloggsCal \n";
	}
}

//class MegaApptEncoder extends ApptEncoder{
//	function encode(){
//		return "Данные о встрече закодированы в формате MegaCal \n";
//	}
//}
/*class CommsManager{
	const BLOGGS = 1;
	const MEGA = 2;
	private $mode = 1;
	
	function __construct($mode){
		$this->mode = $mode;
	}
	
	function getHeaderText(){
		switch($this->mode){
			case(self::MEGA):
			   return "MegaCal верхний колонтитул\n";
			default:
			   return "BloggsCal верхний колонтитул\n";
		}
	}
	
	function getApptEncoder(){
		switch($this->mode){
			case(self::MEGA):
			   return new MegaApptEncoder();
			default:
			   return new BloggsApptEncoder();
		}
	}
}*/
//$comms = new CommsManager(CommsManager::MEGA);
//$apptEncoder = $comms->getApptEncoder();
//print $apptEncoder->encode();

abstract class CommsManager{
	abstract function getHeaderText();
	abstract function getApptEncoder();
	abstract function getFooterText();
}

class BloggsCommsManager extends CommsManager{
	
	function getHeaderText(){
		return "BloggsCal верхний колонтитул\n";
	}
	
	function getApptEncoder(){
		return new BloggsApptEncoder();
	}
	function getFooterText(){
		return "BloggsCal нижний колонтитул\n";
	}
}
$mgr = new BloggsCommsManager();
print $mgr->getHeaderText();
print $mgr->getApptEncoder()->encode();
print $mgr->getFooterText();
