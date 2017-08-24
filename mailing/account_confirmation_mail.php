<?php
declare(strict_types=1);

require __DIR__."/mail.php";

class AccountConfirmationMail extends Mail
{
    protected $subject = "Camagru: Confirmez votre inscription"
}
?>