<?php

declare(strict_types=1);

namespace tatchan\lobinotspwanentiy;

use pocketmine\event\entity\EntitySpawnEvent;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener
{

	public function onEnable(): void
	{
		$this->getLogger()->info("ロビーいるエンティティを消す");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onspawn(EntitySpawnEvent $event)
	{
		$name = $event->getEntity()->getLevel()->getName();
		$entity = $event->getEntity();
		$x = $event->getEntity()->getx();
		$y = $event->getEntity()->getY();
		$z = $event->getEntity()->getZ();
		$vector = new Vector3($x, $y - 10000, $z);
		if (!$entity instanceof Player) {
			if ($name === "lobby") {
				$entity->teleport($vector);
				$entity->kill();
			}
		}
	}

	public
	function onDisable(): void
	{
		$this->getLogger()->info("Bye");
	}
}
