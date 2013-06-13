<?php

/**
 * MonkeyFighter
 *
 * De-Grawlixes text strings so you can enjoy the full glory of swear words.
 *
 * LICENSE
 *
 * This source file is subject to the MIT license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://github.com/TeamOneTickets/Monkey-Fighter/blob/master/LICENSE.txt
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@teamonetickets.com so we can send you a copy immediately.
 *
 * @category    MonkeyFighter
 * @author      J Cobb <j@teamonetickets.com>
 * @copyright   Copyright (c) 2013 Team One Tickets & Sports Tours, Inc. (http://www.teamonetickets.com)
 * @license     https://github.com/TeamOneTickets/Monkey-Fighter/blob/master/LICENSE.txt     MIT License
 */


namespace MonkeyFighter;


/**
 * @category    MonkeyFighter
 * @author      J Cobb <j@teamonetickets.com>
 * @copyright   Copyright (c) 2013 Team One Tickets & Sports Tours, Inc. (http://www.teamonetickets.com)
 * @license     https://github.com/TeamOneTickets/Monkey-Fighter/blob/master/LICENSE.txt     MIT License
 */
class MonkeyFighter
{
    /**
     * The original, censored string
     *
     * @var string
     */
    protected $_original = null;


    /**
     * The new F’n vulgar string
     *
     * @var string
     */
    protected $_vulgar = null;


    /**
     * Associative array of replacements to make
     *
     * NOTE: Some of these are fairly common and are therefore commented out.
     *
     * @var array
     */
    protected $_replacements = array(
        '/Mother****** with the Hat/iu'                     => 'Motherfucker with the Hat',
        '/Mr. Muthaf**kin Exquire/iu'                       => 'Mr. Muthafuckin Exquire',
        '/F*CK/u'                                           => 'FUCK',
        '/F*ck/u'                                           => 'Fuck',
        '/Starf**ker/iu'                                    => 'Starfucker',
        '/Startf**ker/iu'                                   => 'Startfucker',
        '/Hot Sh*t All Stars/iu'                            => 'Hot Shit All Stars',
        '/F***ing Champs/iu'                                => 'Fucking Champs',
        '/Goblin C*CK/iu'                                   => 'Goblin Cock',
        '/F*cktard/iu'                                      => 'Fucktard',
    );


    /**
     * Constructor
     *
     * @param string $original    An array of field default values
     * @param array  $replacements    An array that is used for the preg_replace() PHP-function in the slug generation process
     */
    public function __construct($original, $replacements = null)
    {
        $this->_original = $original;

        if (!is_null($replacements)) {
            $this->_replacements = $replacements;
        }
    }


    /**
     * Make it vulgar!
     */
    public function vulgarize()
    {
        // Apply all the replacements
        $this->_vulgar = preg_replace(array_keys($this->_replacements), $this->_replacements, $this->_original);
    }


    /**
     * Returns the vulgar string
     *
     * @return string The filthy string
     * @see vulgarize()
     */
    public function getVulgarized()
    {
        if (is_null($this->_vulgar)) {
            $this->vulgarize();
        }
        return $this->_vulgar;
    }


    /**
     * Returns the vulgar string
     *
     * @return string The vulgar string
     * @see getVulgarized()
     */
    public function __toString()
    {
        return $this->getVulgarized();
    }


    /**
     * Sets the replacements array that is used for the preg_replace() in the vulgarizing process
     *
     * @param string $replacements
     */
    public function setReplacements($replacements)
    {
        $this->_replacements = $replacements;
    }


}
