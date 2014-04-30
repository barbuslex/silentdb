<div class="page-header">
	<h4>Debug <small>Liste des requêtes SQL</small></h4>
</div>
<?php
if(Config::get('app.debug')) {
	$queries = DB::getQueryLog();
	foreach($queries as $query) {
		var_dump($query['query']);
	}
}