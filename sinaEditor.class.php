<?php

class sinaEditor{
	var $BasePath;
	var $Width;
	var $Height;
	var $eName;
	var $Value;
	var $AutoSave;
	function sinaEditor($eName){
		$this->eName=$eName;
		$this->BasePath='.';
		$this->AutoSave=false;
		$this->Height=460;
		$this->Width=630;
	}
	function __construct($eName){
		$this->sinaEditor($eName);
	}
	function create(){
		$ReadCookie=$this->AutoSave?1:0;
		print <<<eot
		<textarea name="{$this->eName}" id="{$this->eName}" style="display:none;">{$this->Value}</textarea>
		<iframe src="{$this->BasePath}/Edit/editor.htm?id={$this->eName}&ReadCookie={$ReadCookie}" frameBorder="0" marginHeight="0" marginWidth="0" scrolling="No" width="{$this->Width}" height="{$this->Height}"></iframe>
eot;
	}
}