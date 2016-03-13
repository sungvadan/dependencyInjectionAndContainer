<?php
namespace DiDemo\Mailer;

interface MailerInterface
{
	public function sendMessage($to, $object, $message);
}