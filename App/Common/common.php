<?php
	function p($array){
		dump($array,1,"<pre>",0);
	}

	function faceFilter($content){
		preg_match_all("/\[em_\d{1,2}\]/is",$content,$arr);
		if($arr[0]){
			foreach($arr[0] as $key=>$value){
				$content=str_replace($value,"<img src=".__ROOT__."/Public/arclist/".strsub($value).".gif />",$content);
				continue;
			}
		}
		return $content;
	}

	function strsub($sub){
		if(strlen($sub)>=7){
			return substr($sub,4,2);
		}else{
			return substr($sub,4,1);
		}
	}
?>