<?php require_once('include/header.php') ?>
</head>
<body>
	<div class="container">
		<div class="row">
		    <a class="col-md-1 col-md-push-11 btn btn-primary btn-logoff" href="/mainController/logout" role="button">LOGOFF</a>
		    <h2 class="col-md-11 col-md-pull-1">Welcome, <?= ucfirst($user['alias']) ?>!</h2>
		</div>
	    <h4><?= $numPokers['pokes'] ?> people poked you!</h4>
		<div class="row">
	    	<div class="grp-poking col-md-3 ">
<?php
				foreach($listPokers as $listPoker) {
?>
					<p><?= ucfirst($listPoker['alias']) ?> poked you <?=$listPoker['pokes']?> times.</p>
<?php
				}
?>
			</div>
		</div>

		<h3>People you may want to poke.</h3>
		<table class="table-striped table-bordered">
			<thead>
				<tr>
					<td>Name</td>
					<td>Alias</td>
					<td>Email Address</td>
					<td>Poke History</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
<?php
			foreach($listAllPokes as $listAllPoke) {
?>
				<tr>
					<td><?=ucfirst($listAllPoke['name'])?></td>
					<td><?=ucfirst($listAllPoke['alias'])?></td>
					<td><?=$listAllPoke['email']?></td>
					<td><?=$listAllPoke['pokeHistory']?></td>
					<td><a href="/mainController/newUserPoke/<?= $user['id'] ."/". $listAllPoke['id'] ?>">POKE</a></td>
				</tr>
<?php
				}				
?>
			</tbody>
		</table>
	</div>
</body>
</html>

