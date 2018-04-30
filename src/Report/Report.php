<?php

namespace Report;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat as color;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase{

  public $tag = "§7» §a";

  public function onEnable(){

 $this->getLogger()->info("§c≥§7===============================§c≤");
  $this->getLogger()->info("§eReport ZeroTouch Edtion");
$this->getLogger()->info("§eLanguage: deu");
$this->getLogger()->info("§eVersion: 1.0");
$this->getLogger()->info("§ePassed for MCBE Version: 1.2.13-1.2.14");
 $this->getLogger()->info("§c≥§7===============================§c≤");
      }

  public function onDisable(){}

   public function onCommand(CommandSender $sender, Command $command, string $label, array $args):bool {
  if($sender instanceof Player){
        switch(strtolower($command->getName())){
           case "report":
                    if(!isset($args[0])){
      $sender->sendMessage($this->tag."§aSyntax: /report §c<Spieler> <Grund>");
      $sender->sendMessage($this->tag."§eGründe: Hacking, Spamm, Bugusing, Scamm und anderes!");
              return true;
                }
  $pl = $sender->getServer()->getPlayer($args[0]);
  if($pl instanceof Player){
    if(isset($args[1])){
  $motivo = implode(" ", $args);
								$worte = explode(" ", $motivo);
								unset($worte[0]);
								$motivo = implode(" ", $worte);
         $sender->sendMessage($this->tag."§aVielen Dank für deinen Report!");
     foreach($this->getServer()->getOnlinePlayers() as $p){
									if($p->isOp()){
										$p->sendMessage("§7<=---------=>\n§8 - §aNeuer Report§7:\n §8- §eReporteter Spieler§7: ".$args[0]."\n§8 - §aGrund§7: ".$motivo."\n§8 - §aReportet von§7: ".$sender->getName()."\n§8 - §aIP-Adresse§7: ".$pl->getAddress()."\n§8 - §aSpieler CID§7: ".$pl->getClientId()."\n§7<=---------=>");
                  }
            }
       } else {
   $sender->sendMessage($this->tag."§aSyntax: /report §c<Spieler> <Grund>");
         return true;
     }
   } else {
    $sender->sendMessage("§c".$args[0]."Dieser Spieler wurde nicht gefunden!");
    return true;
                   }
             }
       } else {
    $sender->sendMessage($this->tag."Dieser Command kann nur Ingame Benutzt werden!");
      return true;       
      }
  }
}
