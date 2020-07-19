<?php

declare(strict_types=1);

namespace tatchan\lobinotspwanentiy;

use pocketmine\event\entity\EntitySpawnEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{

	public function onEnable(): void
	{
		$this->getLogger()->info("ロビーいるエンティティを消す");
	}

	public function onspawn(EntitySpawnEvent $event)
	{
		$name = $event->getEntity()->getLevel()->getName();
		if ($name === "lobby") {
			$event->setCancelled(true);
		}
	}

	public function onDisable(): void
	{
		$this->getLogger()->info("Bye");
	}
}
