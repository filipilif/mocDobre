<?php

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;


class RouterFactory
{
	use Nette\StaticClass;

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		$router = new RouteList;
		$router[] = new Route('edit/<id>', 'Homepage:Edit');
		$router[] = new Route('delete/<id>', 'Homepage:Delete');
		$router[] = new Route('add', 'Homepage:Add');
		$router[] = new Route('sign', 'Sign:in');
		$router[] = new Route('signout', 'Sign:out');
		$router[] = new Route('<presenter>/<action>', 'Homepage:default');
		return $router;
	}

}
