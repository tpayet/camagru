<?php
declare(strict_types=1);

abstract class Mail 
{
    protected $headers = "From: camagru@camagru.com \r\nReply-To: camagru@camagru.com \r\n";

    function __construct(string $to) {
        $this->to = $to;
        $this->headers .= 'MIME-Version: 1.0' . "\r\n";
        $this->headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    }

    public function send() {
        mail($this->to, $this->subject, $this->message, $this->headers);
    }
}
?>