<?php

class HtmlKlasse
{
	public $klassens;
	
	public function __construct($klassens)
	{
		$this ->klassens = $klassens;
	}
	
	public function getKlassens()
	{
		$html = '';
		foreach ($this->klassens as $klasse)
		{
			$html.= '	<tr>
		<td><input type="text" name="klasse'.$klasse['klasse_id'].'" value="'.$klasse['name'].'"></td>
		<td><input type="submit" name="" value="deaktivieren"></td>
		<td><input type="submit" name="update" value="Update"></td>
	</tr>';
			
		}
	return $html;
	}
	
}

?>