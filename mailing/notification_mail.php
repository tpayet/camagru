<?php
declare(strict_types=1);

require_once __DIR__."/mail.php";

class NotificationMail extends Mail
{
    protected $subject = "Camagru: Someone commented your picture";

    function __construct(string $to) {
        parent::__construct($to);

        $this->message = "<html><body>Hey someone just commented your picture, you should see it <a href='http://localhost:8080/galery'>http://localhost:8080/galery</a></body></html>";
    }
}
?>