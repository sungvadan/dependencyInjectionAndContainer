<?php

try
{
	$dbh = new PDO('sqlite:'.__DIR__.'/database.sqlite');
}
catch(PDOException $e){
	die('die cnmr');
}


$dbh->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

$dbh->beginTransaction();

$query  = <<<EDO

DROP TABLE IF EXISTS people_to_spam;

CREATE TABLE people_to_spam (
    id INTEGER PRIMARY KEY, 
    email STRING,
    name STRING,
    spamming_since TIMESTAMP
);

INSERT INTO people_to_spam VALUES(1,'hello@knpuniversity.com', 'KnpU', '2011-06-05');
INSERT INTO people_to_spam VALUES(2,'leanna@knplabs.com', 'Leanna Pelham', '2012-02-24');

EDO
	;

$dbh->exec($query);

$dbh->commit();