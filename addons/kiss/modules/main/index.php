<?php
if (!defined('FLUX_ROOT')) exit;

// MVP total

$title = Flux::message('MVPLogTitle');

$sql = "SELECT COUNT(mvp_id) AS total FROM {$server->logsDatabase}.mvplog";
$sth = $server->connection->getStatementForLogs($sql);
$sth->execute();
$info['total_mvp_killed'] = $sth->fetch()->total;

?>