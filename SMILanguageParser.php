<?php
	//getSubTitlesFromSMI("subtitle-4.smi");

	function getSubTitlesFromSMI($path)
	{
		//Get the file content
		$file = file_get_contents($path);

		//Regular expression to identify .CLASS {*} through out class
		$regex = '/\.([A-Za-z]\w*[^?}]*})/';
		preg_match_all($regex, $file, $matches);

		//Process the block to create language object
		foreach($matches[0] as $val)
		{
			$regex = '/( { ( (?: [^{}]* | (?1) )* ) } )/x';
			preg_match_all($regex, $val, $obj);
			$remove = array("{", "}");
			$str=str_replace($remove,"",$obj[0][0]);
			$x[]=explode(";",$str);
		}
		foreach($x as $k=>$v)
		{
			unset($v[sizeof($v)-1]);
			foreach ($v as $key=>$value)
			{
				$arr=explode(":",$value);
				//print_r($arr);
				$dk=preg_replace('~[\r\n\t]+~', '', $arr[0]);
				$dv=preg_replace('~[\r\n\t]+~', '', $arr[1]);
				$data[$k][strtolower($dk)]=$dv;	
			}
		}
		//return $data;
		echo json_encode($data);
		/*Output: 
			[{"name":" English","lang":" en-US","samitype":" CC"},{"name":" \ud55c\uad6d\uc5b4","lang":" ko-KR","samitype":" CC"}]
		*/
	}
?>
