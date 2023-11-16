<?php header('Access-Control-Allow-Origin: *'); ?>
<?php

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");
$country = filter_input(INPUT_GET,'country',FILTER_SANITIZE_STRING);

$context = filter_input(INPUT_GET,'context',FILTER_SANITIZE_STRING);

if ($context == "cities") {
	$stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities INNER JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$country%'");
}
else 
{
	$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<table>
<?php if ($context == 'cities'):?>
	<tr>
		<th>Name</th>
		<th>District</th>
		<th>Population</th>
	</tr>
	<?php foreach ($results as $row): ?>
	<tr>
		<th><?= $row['name']; ?></th>
		<th><?= $row['district']; ?></th>
		<th><?= $row['population']; ?></th>
	</tr>
<?php endforeach; ?>

<?php else: ?>
	<tr>
		<th>Name</th>
		<th>Contintent</th>
		<th>Independece</th>
		<th>Head of State</th>
	</tr>
<?php foreach ($results as $row): ?>
	<tr>
		<th><?= $row['name']; ?></th>
		<th><?= $row['continent']; ?></th>
		<th><?= $row['independence_year']; ?></th>
		<th><?= $row['head_of_state']; ?></th>
	</tr>
<?php endforeach; ?>
</table>
<?php endif ?>
</table>
