<?php
use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Repository\Repository;
/**
 * @method User|NULL getById($id)
 */
class UsersRepository extends Repository
{
	public function findHomepageOverview()
	{
		return $this->findBy(['deleted'=> null]);
	}
	static function getEntityClassNames(): array
	{
		return [User::class];
	}
}