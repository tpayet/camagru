<?php
declare(strict_types=1);

require __DIR__."/mail.php";

class ForgottenPwdMail extends Mail
{
    protected $subject = "Camagru: Mot de passe oublié";
}
?>