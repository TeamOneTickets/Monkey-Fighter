<?php

namespace MonkeyFighter\Test;

use MonkeyFighter\MonkeyFighter;

class MonkeyFighterTest extends \PHPUnit_Framework_TestCase
{
    public function testCanVulgarizeStrings()
    {
        $monkeyFighter = new MonkeyFighter('F**k MotherF*!ker S#!t P*$$! P**s Muthaf#$!ing C**KSUCKER NI**** N***A N*$@ah T**s T$$TYf**! A-- B--CH D*** F@G F@***t');
        $dirty = $monkeyFighter->getVulgarized();
        assertEquals('Fuck MotherFucker Shit Pussy Piss Muthafucking COCKSUCKER NIGGER NIGGA Niggah Tits TITTYfuck Ass BITCH Damn FAG Faggot', $dirty);


        $monkeyFighter = new MonkeyFighter('Mother****** with the Hat');
        $dirty = $monkeyFighter->getVulgarized();
        assertEquals('Motherfucker with the Hat', $dirty);


        $monkeyFighter = new MonkeyFighter('Mr. Muthaf**kin Exquire');
        $dirty = $monkeyFighter->getVulgarized();
        assertEquals('Mr. Muthafuckin Exquire', $dirty);


        $monkeyFighter = new MonkeyFighter('F*CK F*ck f*ck');
        $dirty = $monkeyFighter->getVulgarized();
        assertEquals('FUCK Fuck fuck', $dirty);


        $monkeyFighter = new MonkeyFighter('Starf**ker Startf**ker');
        $dirty = $monkeyFighter->getVulgarized();
        assertEquals('Starfucker Startfucker', $dirty);


        $monkeyFighter = new MonkeyFighter('Hot Sh*t All Stars');
        $dirty = $monkeyFighter->getVulgarized();
        assertEquals('Hot Shit All Stars', $dirty);


        $monkeyFighter = new MonkeyFighter('The F***ing Champs');
        $dirty = $monkeyFighter->getVulgarized();
        assertEquals('The Fucking Champs', $dirty);


        $monkeyFighter = new MonkeyFighter('Goblin C*ck');
        $dirty = $monkeyFighter->getVulgarized();
        assertEquals('Goblin Cock', $dirty);


        $monkeyFighter = new MonkeyFighter('F*cktard');
        $dirty = $monkeyFighter->getVulgarized();
        assertEquals('Fucktard', $dirty);


        $monkeyFighter = new MonkeyFighter('Dane Cook Elizabeth Cook DC 101 Chili Cook-Off Bethune Cookman Wildcats Baseball');
        $dirty = $monkeyFighter->getVulgarized();
        assertEquals('Dane Cook Elizabeth Cook DC 101 Chili Cook-Off Bethune Cookman Wildcats Baseball', $dirty);


    }


    public function testCanConfigureSlugResult()
    {
        $monkeyFighter = new MonkeyFighter(
            'F**k MotherF*!ker S#!t P*$$! P**s Muthf#$!ing C**KSUCKER NI**** N***A N*$@ah T**s T$$%Yf**! A-- B--CH D***',
            array(
                '/F[UCK!@#$%&*-]{3}/'           => 'FUGG',
                '/([Ff])[uck!@#$%&*-]{3}/'      => '$1ugg',
            )
        );

        $monkeyFighter->vulgarize();
        $dirty = $monkeyFighter->__toString();
        assertequals('Fugg MotherFugger S#!t P*$$! P**s Muthfugging C**KSUCKER NI**** N***A N*$@ah T**s T$$%Yfugg A-- B--CH D***', $dirty);
    }
}
