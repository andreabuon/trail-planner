<?php
	function newOption($label, $value=NULL){
		if($value)
			return "<option value='$value'>$label</option>";
		return "<option>$label</option>";
	}
?>	
