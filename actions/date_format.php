<?php 
	function date_format_ch($pickerDate){
		$date = DateTime::createFromFormat('Y-m-d H:i:s', $pickerDate);
		echo $date->format('d.m.Y H:i:s');
	}  
?>