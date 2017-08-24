<?php
declare(strict_types=1);

abstract class Mail 
{
    private $headers = "From: camagru@camagru.com \r\nReply-To: camagru@camagru.com \r\n";

    function __construct(string $to) {
        $this->to = $to;
    }

    public function send() {
        mail($this->to, $this->subject, $this->message, $this->headers);
    }
}
?>