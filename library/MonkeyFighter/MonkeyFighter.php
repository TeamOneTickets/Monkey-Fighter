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
     * @lol http://www.youtube.com/watch?v=vbZhpf3sQxQ
     */
    protected $_replacements = array(
        '/([Ss])[hit!@#$%&*-]{3}/'                      => '$1hit',
        '/S[HIT!@#$%&*-]{3}/'                           => 'SHIT',

        '/([Pp])[usy!@#$%&*-]{4}/'                      => '$1ussy',
        '/P[USY!@#$%&*-]{4}/'                           => 'PUSSY',

        '/([Pp])[is!@#$%&*-]{3}/'                       => '$1iss',
        '/P[IS!@#$%&*-]{3}/'                            => 'PISS',

        '/([Mm])[otherfuck!@#$%&*-]{11}/'               => '$1otherfucker',
        '/F[OTHERFUCK!@#$%&*-]{11}/'                    => 'MOTHERFUCKER',

        '/([Cc])[unt!@#$%&*-]{3}/'                      => '$1unt',
        '/C[UNT!@#$%&*-]{3}/'                           => 'CUNT',

        '/([Cc])(?!ook)[ock!@#$%&*-]{3}/'               => '$1ock',
        '/C(?!ook)[OCK!@#$%&*-]{3}/'                    => 'COCK',

        '/([Dd])[amn!@#$%&*-]{3}/'                      => '$1amn',
        '/D[AMN!@#$%&*-]{3}/'                           => 'DAMN',

        '/([Aa])[s!@#$%&*-]{2}/'                        => '$1ss',
        '/A[S!@#$%&*-]{2}/'                             => 'ASS',

        '/([Bb])[itch!@#$%&*-]{4}/'                     => '$1amn',
        '/B[ITCH!@#$%&*-]{4}/'                          => 'BITCH',

        '/([Tt])[ity!@#$%&*-]{4}/'                      => '$1itty',
        '/T[ITY!@#$%&*-]{4}/'                           => 'TITTY',

        '/([Tt])[it!@#$%&*-]{2}(s)?/'                   => '$1it$2',
        '/T[IT!@#$%&*-]{2}(S)?/'                        => 'TIT$1',

        '/([Nn])[iger!@#$%&*-]{5}/'                     => '$1igger',
        '/N[IGER!@#$%&*-]{5}/'                          => 'NIGGER',

        '/([Nn])[iga!@#$%&*-]{4}(h)?/'                  => '$1igga$2',
        '/N[IGA!@#$%&*-]{4}(H)?/'                       => 'NIGGA$1',

        '/([Ff])[agot!@#$%&*-]{5}/'                     => '$1aggot',
        '/F[AGOT!@#$%&*-]{5}/'                          => 'FAGGOT',

        '/([Ff])[uck!@#$%&*-]{3}/'                      => '$1uck',
        '/F[UCK!@#$%&*-]{3}/'                           => 'FUCK',

        '/([Ff])[ag!@#$%&*-]{2}/'                       => '$1ag',
        '/F[AG!@#$%&*-]{2}/'                            => 'FAG$1',

    );


    /**
     * Constructor
     *
     * @param string $original    An array of field default values
     * @param array  $replacements    An array that is used for the preg_replace() PHP-function
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
