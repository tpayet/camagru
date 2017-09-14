<?php
declare(strict_types=1);

require_once __DIR__."/mail.php";

class ForgottenPwdMail extends Mail
{
    protected $subject = "Camagru: Mot de passe oublié";

    function __construct(string $to, string $h_pwd) {
        parent::__construct($to);
        $this->message = "<html><body>Please follow this url to reset you password:<br/><a href='localhost:8080/reset_pwd?hash=" . $h_pwd . "'>localhost:8080/reset_pwd?hash=" . $h_pwd . "</a></body></html>";
    }
}
?>