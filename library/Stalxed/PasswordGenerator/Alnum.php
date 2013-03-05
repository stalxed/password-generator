<?php
namespace Stalxed\PasswordGenerator;

use Stalxed\System\Random;

/**
 * Performs the generation of password which contains letters and digits.
 *
 */
class Alnum
{
    /**
     * The list of characters to generate the password.
     *
     * @var array
     */
    private $characters = array(
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
        'n', 'o', 'p', 'r', 's', 't', 'u', 'v', 'x', 'y', 'z',
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
        'N', 'O', 'P', 'R', 'S', 'T', 'U', 'V', 'X', 'Y', 'Z',
        '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
    );
    /**
     * Password.
     *
     * @var string
     */
    private $password;

    /**
     * Generates the password.
     *
     * @param integer $length
     */
    public function generate($length = 8)
    {
        $this->doGenerate($length);
    }

    /**
     * Returns the password.
     *
     * @return string
     */
    public function get()
    {
        return $this->password;
    }

    /**
     * Generates and returns the password.
     *
     * @param integer $length
     * @return string
     */
    public function generateAndGet($length = 8)
    {
        $this->doGenerate($length);

        return $this->password;
    }

    /**
     * Generates the password length of $length characters.
     *
     * @param integer $length
     */
    public function doGenerate($length)
    {
        $random = new Random();

        $this->password = '';
        for ($i = 0; $i < $length; $i++) {
            $index = $random->generateDigit(0, count($this->characters) - 1);

            $this->password .= $this->characters[$index];
        }
    }
}
