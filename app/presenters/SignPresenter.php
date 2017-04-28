<?php

namespace App\Presenters;

use Nette;
use App\Forms;


class SignPresenter extends BasePresenter
{
	/** @var Forms\SignInFormFactory @inject */
	public $signInFactory;

	/** @var Forms\SignUpFormFactory @inject */
	public $signUpFactory;


	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
		return $this->signInFactory->create(function () {
			$this->flashMessage('Přihlášení proběhlo v pořádku.');
			$this->redirect('Homepage:');
		});
	}

	

	/**
	 * Sign-up form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignUpForm()
	{
		$form = $this->signUpFactory->create(function () {
			$this->redirect('Homepage:');
		});
		return $form;
	}


	public function actionOut()
	{
		$this->getUser()->logout();
	}

}
