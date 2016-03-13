<?php


namespace DiDemo\Mailer;

class SmtpMailer implements MailerInterface
{
	private $hostname;
	private $user;
	private $password;
	private $port;

	public function __construct($hostname, $user, $password, $port)
	{
		$this->hostname = $hostname;
		$this->user = $user;
		$this->password = $password;
		$this->port = $port;
	}


	public function sendMessage( $to, $object, $message)
	{

		$logPath = __DIR__.'/../../../logs/mail.logs';
		$lines = array();
		$lines[] = date('Y-m-d H:i:s');
		$lines[] = '___________________________';
		$lines[] = 'From :' .$this->user ;
		$lines[] = 'To :' .$to ;
		$lines[] = 'Object :' .$object ;
		$lines[] = 'Message :' .$message ;
		$lines[] = '___________________________';
		$lines[] = date('Y-m-d H:i:s');

		$fh = fopen($logPath, 'a');
		fwrite($fh, implode('\n', $lines).'\n');
	}
}