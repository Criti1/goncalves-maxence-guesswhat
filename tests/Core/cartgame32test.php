<?php

namespace App\Tests\Core;

use App\Core\CardGame32;
use PHPUnit\Framework\TestCase;
use App\Core\Card;

class cartgame32test extends TestCase{

    public function testGetCard()
    {
        $CardGame = CardGame32::factoryCardGame32();
        $index = 1;
        $card = $CardGame->getCard($index);
        $this->assertEquals('roi', $card->getName());
        $this->assertEquals('pique', $card->getColor());
    }
    public function testGetCardPlusGrand()
    {
        $cardgame = CardGame32::factoryCardGame32();
        $index = 125;
        $card1 = $cardgame->getCard($index);
        $this->assertEquals('9', $card1->getName());
        $this->assertEquals('Coeur', $card1->getColor());
    }
    public function testGetCardPlusPetit()
    {
        $cardgame = CardGame32::factoryCardGame32();
        $index = -125;
        $card1 = $cardgame->getCard($index);
        $this->assertEquals('6', $card1->getName());
        $this->assertEquals('Pique', $card1->getColor());
    }
    public function testToString1Cart()
    {
        $jeudecart = new CardGame32([new card('as','pique')]);
        $this->assertEquals('CardGame32 : 1 carte(s)',$jeudecart->__tostring());
    }
    public function testToString2Cart()
    {
        $jeudecart = new CardGame32([new card('as','pique'), new card('roi', 'coeur')]);
        $this->assertEquals('CardGame32 : 2 carte(s)',$jeudecart->__tostring());
    }
    public function testShuffle()
    {
        $CardGame1 = CardGame32 :: factoryCardGame32();
        $CardGame1->shuffle();
        $CardGame2 = CardGame32 :: factoryCardGame32();
        $this->assertNotEquals($CardGame1, $CardGame2);
    }
}