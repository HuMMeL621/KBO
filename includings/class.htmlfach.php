<?php

class HtmlFach
{
	public $faechers;
	
	public function __construct($faechers)
	{
		$this ->faechers = $faechers;
	}
	
	public function getFaechers()
	{
		$html = '';
		foreach ($this->faechers as $fach)
		{
			$html.= '	<tr>
		<td><input type="text" name="fach'.$fach['fach_id'].'" value="'.$fach['name'].'"></td>
		<td><input type="submit" name="" value="deaktivieren"></td>
		<td><input type="submit" name="update" value="Update"></td>
	</tr>';
			
		}
	return $html;
	}
	
}

?>