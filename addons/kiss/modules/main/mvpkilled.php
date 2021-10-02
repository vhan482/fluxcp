<?php
if (!defined('FLUX_ROOT')) exit;

// MVP total

$title = Flux::message('MVPLogTitle');

// $sql = "SELECT COUNT(mvp_id) AS total FROM {$server->logsDatabase}.mvplog";
$sql = "SELECT COUNT(*) as total FROM {$server->logsDatabase}.`picklog` WHERE `type` = 'U'";
$sth = $server->connection->getStatementForLogs($sql);
$sth->execute();
echo $sth->fetch()->total;
die();

?>