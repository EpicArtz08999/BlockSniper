<?php

namespace Sandertv\BlockSniper\events;

use pocketmine\event\plugin\PluginEvent;
use Sandertv\BlockSniper\Loader;

abstract class BaseEvent extends PluginEvent {
	
	public $owner;
	
	public function __construct(Loader $owner) {
		parent::__construct($owner);
		$this->owner = $owner;
	}
	
	public function getOwner() {
		return $this->owner;
	}
}
