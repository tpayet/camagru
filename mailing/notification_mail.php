<?php
declare(strict_types=1);

require __DIR__."/mail.php";

class NotificationMail extends Mail
{
    protected $subject = "Camagru: Une personne a commenté votre photo";
}
?>