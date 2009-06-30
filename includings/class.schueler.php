<?php
class Schueler
{

	private	$schueler_id;
	private	$vorname;
	private	$nachname;
	private	$schulklasse_id;
    private $loginname;

	public	function setId($schueler_id)
	{
		$this -> schueler_id = $schueler_id;
	}

	public	function getId()
	{
		return $this -> schueler_id;
	}

	public	function setVorname($vorname)
	{
		$this -> vorname = $vorname;
	}

	public	function getVorname()
	{
		return $this -> vorname;
	}

    public  function setNachname($nachname)
    {
        $this -> nachname = $nachname;
    }

    public  function getNachname()
    {
        return $this -> nachname;
    }

    public  function setSchulklasse_id($schulklasse_id)
    {
        $this -> schulklasse_id = $schulklasse_id;
    }

    public  function getSchulklasse_id()
    {
        return $this -> schulklasse_id;
    }

    public  function create_login()
    {
        $this -> loginname = substr($this -> vorname,0,1).$this -> nachname;
    }

    public  function getLogin()
    {
        return $this -> loginname;
    }
    
}
?>
