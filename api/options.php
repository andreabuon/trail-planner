<?php
	function newOption($label, $value=NULL){
		if($value!=NULL)
			return "<option value='$value'>$label</option>";
		return "<option>$label</option>";
	}
?>	
