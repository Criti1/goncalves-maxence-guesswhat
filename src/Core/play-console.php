<?php

require '../../vendor/autoload.php';

echo "*** Création d'un jeu de 32 cartes.***\n";
$cardGame = App\Core\CardGame32::factoryCardGame32();


echo " ==== Instanciation du jeu, début de la partie. ==== \n";
$hasard = rand(0,10);
$count = 0;
$game =  new App\Core\Guess($cardGame, $cardGame->getCard($hasard), false);

do{
  
  do{
    $userCardIndex = readline("Entrez une position de carte dans le jeu : ");
  }while($userCardIndex < 0 || $userCardIndex > 51);

    // code naïf, car aucun contrôle de validité de $userCardIndex...
    $userCard = $cardGame->getCard($userCardIndex);
    if ($game->isMatch($userCard)) {
      echo "Bravo ! \n";
      $fin = true;
    }
    else {
    echo "Loupé !\n";
    if ($userCardIndex > $hasard){
      echo "plus petit !\n";
    }
    else {
      echo "plus grand !\n";
    }
    }
    $count++;
}while($hasard != $userCardIndex);
if ($count > 6){
  echo "mauvaise strat\n";
}
else {
  echo "bonne strat \n";
}

echo ("la carte est le : ".$userCard."\n");
echo "*** Terminé ***\n";