<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;
use App\Model;
use \Orm;

class HomepagePresenter extends BasePresenter
{
	/** @var Orm @inject */
	public $orm;
	
	/** @var User */
	private $user;
	
	protected function startup()
	{
		parent::startup();
		if (!$this->getUser()->isLoggedIn()) {
			$this->flashMessage('You shall not pass.');
			$this->redirect('Sign:in');
		}
	}
	
	public function renderDefault()
	{	
		$this->template->users = $this->orm->users->findHomepageOverview();
	}
	
	public function renderEdit($id)
	{
		
		$this->template->edited_user = $this->orm->users->getById($id);
		
	}
	
	public function renderAdd()
	{
		
	}
	
	
	protected function createComponentEditForm()
	{
		$form = new Form;
		$form->addText('name', 'Jméno:')->setRequired();
		$form->addPassword('password', 'Password:');
		$form->addText('car', 'Auto:')->setRequired();
		$form->addTextArea('description', 'Popis:')
        ->setRequired();
		$form->addSubmit('send', 'Provést úpravu');
		$form->onSuccess[] = [$this, 'editFormSucceeded'];
		
		$user = $this->orm->users->getById($this->getParameter('id'));
		$form->setDefaults($user->toArray());
	
		return $form;
	}
	
	public function editFormSucceeded($form,$values)
	{
		$user = $this->orm->users->getById($this->getParameter('id'));
		$user->setValue('name',$values->name);
		if ($values->password) $user->setValue('password',$values->password);
		$user->setValue('car',$values->car);
		$user->setValue('description',$values->description);
		$user->setValue('deleted',null);
		
		$this->orm->users->persistAndFlush($user);
		$this->flashMessage('Provedli jste editaci uživatele '.$values->name.'.', 'success');
 		$this->redirect('Homepage:');
	}
	
	protected function createComponentAddForm()
	{
		$form = new Form;
		$form->addText('name', 'Jméno:')->setRequired();
		$form->addPassword('password', 'Password:');
		$form->addText('car', 'Auto:')->setRequired();
		$form->addTextArea('description', 'Popis:')
        ->setRequired();
		$form->addSubmit('send', 'Přidat uživatele');
		$form->onSuccess[] = [$this, 'addFormSucceeded'];
		
		return $form;
	}
	
	public function addFormSucceeded($form,$values)
	{
		$user = new \User();
		$user->setValue('name', $values->name);
		$user->setValue('password', $values->password);
		$user->setValue('car', $values->car);
		$user->setValue('description', $values->description);
		
		
		$this->orm->users->persistAndFlush($user);
		$this->flashMessage('Přidán uživtel '.$values->name.'.', 'success');
 		$this->redirect('Homepage:');
	}
	public function renderDelete($id)
	{
		$user = $this->orm->users->getById($id);
		$user->setValue('deleted', 'now');
		$this->orm->users->persistAndFlush($user);
		$this->flashMessage('Smazán uživatel '.$user->name.'.');
		$this->redirect(':default');
	}

}