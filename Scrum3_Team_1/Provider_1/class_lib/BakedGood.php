<?php

class BakedGood
{
	private $id;
	private $name;
	private $flavor;
	private $price;
	private $cookTime;
	
	public function getId()
	{
		return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getFlavor()
	{
		return $this->flavor;
	}
	public function setFlavor($flavor)
	{
		$this->flavor = $flavor;
	}
	public function getPrice()
	{
		return $this->price;
	}
	public function setPrice($price)
	{
		$this->price = $price;
	}
	public function getCookTime()
	{
		return $this->cookTime;
	}
	public function setCookTime($cookTime)
	{
		$this->cookTime = $cookTime;
	}

	function __construct($id, $name, $flavor, $price, $cookTime) {
		$this->id = $id;
		$this->name = $name;
		$this->flavor = $flavor;
		$this->price = $price;
		$this->cookTime = $cookTime
	  }
}

?>