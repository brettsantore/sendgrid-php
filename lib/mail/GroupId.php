<?php 
/**
 * This helper builds the GroupId object for a /mail/send API call
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
 * This class is used to construct a GroupId object for the /mail/send API call
 * 
 * @package SendGrid\Mail
 */
class GroupId implements \JsonSerializable
{
    // @var int The unsubscribe group to associate with this email
    private $group_id;

    /**
     * Optional constructor
     *
     * @param int|null $group_id The unsubscribe group to associate with this email
     */ 
    public function __construct($group_id=null)
    {
        if (isset($group_id)) {
            $this->setGroupId($group_id);
        }
    }

    public function getGroupId()
    {
        return $this->group_id;
    }

    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
     * Return an array representing a GroupId object for the SendGrid API
     * 
     * @return null|array
     */  
    public function jsonSerialize()
    {
        return $this->getGroupId();
    }
}