<?php
declare(strict_types=1);

require_once __DIR__."/mail.php";

class AccountConfirmationMail extends Mail
{
    protected $subject = "Camagru: Please confirm your account";

    function __construct(string $to, string $username) {
        parent::__construct($to);
        $this->username = $username;
        $this->message = "<html><body>Welcome on Camagru,<br/>Please confirm your registration: <br/><a href='http://localhost:8080/confirm_account?username=$this->username'>http://localhost:8080/confirm_account?username=$this->username</a>";
        $this->message .= "\n <form action='localhost:8080/confirm_account?username=" . $this->username . "><input type='submit' name='confirm'></form></body></html>";
    }
}
?>