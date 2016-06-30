<?php
class ModuleGenerique {
	protected $titre;
	protected $controleur;
	

	public function getTitre()
	{
		return $this->titre;
	}
	
	public function display()
	{
		$this->controleur->display();
	}
}

class ControleurGenerique
{
	protected $classeVue;
	protected $fonctionVue;
	protected $paramsFonctionVue;
	protected $titre;
	
	
	public function display()
	{
		call_user_func_array(array($this->classeVue, $this->fonctionVue), $this->paramsFonctionVue);
	}
	
	public function constructView ($classe, $fonction, $tableauParams)
	{
		if(is_array($tableauParams)){
			$this->classeVue = $classe;
			$this->fonctionVue = $fonction;
			$this->paramsFonctionVue = $tableauParams;
		}else{
			throw new ControleurGeneriqueException("tableau vide");
		}
		
	}
	
	public function getTitre ()
	{
		return $this->titre;
	}
	

}

 class ControleurGeneriqueException extends Exception{}



