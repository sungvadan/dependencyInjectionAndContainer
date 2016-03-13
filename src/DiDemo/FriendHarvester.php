<?php

namespace DiDemo;
use DiDemo\Mailer\MailerInterface;



class FriendHarvester
{
	private $pdo;

	private $mailer;

	public function __construct(\PDO $pdo, MailerInterface $mailer)
	{
		$this->pdo = $pdo;
		$this->mailer = $mailer;
	}

	public function emailFriends()
	{


		$sql = "select * from people_to_spam";

		$query = $this->pdo->query($sql);
		foreach($query as $row)
		{
			$this->mailer->sendMessage($row['email'],'test mail', 'hahahahahaha') ;
		}

	}
}