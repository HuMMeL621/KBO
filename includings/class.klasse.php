<?php
class Klasse
{

	private	$name;
	private	$schulklasse_id;
    public $schuelerliste;

	public	function setId($schulklasse_id)
	{
		$this -> schulklasse_id = $schulklasse_id;
	}

	public  function getId()
	{
		return $this -> schulklasse_id;
	}

    public	function setName($name)
	{
		$this -> name = $name;
	}

	public	function getName()
	{
		return $this -> name;
	}

    public  function getSchuelerliste()
    {
        return $this -> schuelerliste;
    }

    public function addSchueler($s) //s=>Typ: Objekt Schueler
    {
        $this -> schuelerliste[$s->getId()] = $s;
    }
    
}
?>