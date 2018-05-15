<?php 
/**
 * This helper builds the BccSettings object for a /mail/send API call
 * 
 * PHP Version - 5.6, 7.0, 7.1, 7.2
 *
 * @package   SendGrid\Mail
 * @author    Elmer Thomas <dx@sendgrid.com>
 * @copyright 2018 SendGrid
 * @license   https://opensource.org/licenses/MIT The MIT License
 * @version   GIT: <git_id>
 * @link      http://packagist.org/packages/sendgrid/sendgrid 
 */
namespace SendGrid\Mail;

/**
 * This class is used to construct a BccSettings object for the /mail/send API call
 * 
 * @package SendGrid\Mail
 */
class BccSettings implements \JsonSerializable
{
    // @var bool Indicates if this setting is enabled
    private $enable;
    // @var string The email address that you would like to receive the BCC
    private $email;

    /**
     * Optional constructor
     *
     * @param bool|null   $enable Indicates if this setting is enabled
     * @param string|null $email  The email address that you would like 
     *                            to receive the BCC
     */
    public function __construct($enable=null, $email=null)
    {
        if(isset($enable)) $this->setEnable($enable);
        if(isset($email)) $this->setEmail($email);
    }

    public function setEnable($enable)
    {
        $this->enable = $enable;
    }

    public function getEnable()
    {
        return $this->enable;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Return an array representing a BccSettings object for the SendGrid API
     * 
     * @return null|array
     */  
    public function jsonSerialize()
    {
        return array_filter(
            [
                'enable' => $this->getEnable(),
                'email'  => $this->getEmail()
            ],
            function ($value) {
                return $value !== null;
            }
        ) ?: null;
    }
}
