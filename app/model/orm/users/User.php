<?php

//use DateTimeImmutable;
use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Entity\Entity;


/**
 * User
 *
 * @property int                        $id          {primary}
 * @property string                     $name
 * @property string                     $password
 * @property string                     $car
 * @property string                     $description
 * @property DateTime          $created   {default now}
 * @property DateTime|NULL          $deleted
 */
class User extends Entity
{
	protected function getterCreated($created)
	{		
		return $created;
	}
	
	protected function setterPassword($password)
	{
		return \Nette\Security\Passwords::hash($password);
	}
}
