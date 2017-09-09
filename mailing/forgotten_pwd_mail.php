<?php
declare(strict_types=1);

require __DIR__."/mail.php";

class ForgottenPwdMail extends Mail
{
    protected $subject = "Camagru: Mot de passe oublié";

    function __construct(string $to, string $h_pwd) {
        parent::__construct($to);
        $this->h_pwd = $h_pwd;
    }

    fun
}
?>