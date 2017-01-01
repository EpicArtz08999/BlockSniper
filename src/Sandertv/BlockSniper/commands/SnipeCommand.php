<?php

namespace Sandertv\BlockSniper\commands;

use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;
use Sandertv\BlockSniper\Loader;
use pocketmine\Player;
use Sandertv\BlockSniper\shapes\BaseShape;

class SnipeCommand extends BaseCommand {
    
    public function __construct(Loader $owner) {
        parent::__construct($owner, "snipe", "Snipe a small cluster of blocks at the location you're looking", "<type> <radius>", ["shoot", "launch"]);
        $this->setPermission("blocksniper.command.snipe");
    }
    
    /**
     * @param CommandSender $sender
     * @param type $commandLabel
     * @param array $args
     * @return boolean
     */
    public function execute(CommandSender $sender, $commandLabel, array $args) {
        if(!$this->testPermission()) {
            return false;
        }
        
        if(!$sender instanceof Player) {
            $this->sendConsoleError($sender);
            return;
        }
        
        if(!isset($args[1])) {
            return false;
        }
        
        $type = ("TYPE_" . strtoupper($args[0]));
        if(!defined(BaseShape::$type)) {
            $sender->sendMessage(TF::RED . "[Warning] That is not a valid type.");
            return;
        }
        
        if(!is_numeric($args[1])) {
            $sender->sendMessage(TF::RED . "[Warning] The radius should be numeric.");
        }
        
        $center = $sender->getTargetBlock(100);
        if(!$center) {
            $sender->sendMessage(TF::RED . "[Warning] No target block could be found.");
        }
        
        switch($type) {
            case "TYPE_CUBE":
                // TODO
                break;
            case "TYPE_SPHERE":
                // TODO
                break;
        }
        
        return true;
    }
}