<?php
// custom/entry_points/update_duplicated_opportunities.php
define('sugarEntry', true);
require_once 'include/entryPoint.php';
require_once 'data/BeanFactory.php';

global $db;

echo '<h2>Actualización de oportunidades duplicadas</h2>';
echo '<table border="1" cellpadding="5" cellspacing="0">';
echo '<tr style="background:#f2f2f2;">
        <th>ID</th>
        <th>Nombre anterior</th>
        <th>Nuevo nombre</th>
      </tr>';

$totalActualizados = 0;

// Buscar duplicados
$q = "
    SELECT name
    FROM opportunities
    WHERE name LIKE '26%'
    GROUP BY name
    HAVING COUNT(*) > 1
";
$res = $db->query($q);

while ($row = $db->fetchByAssoc($res)) {
    $name = $row['name'];

    // Obtener todos los duplicados
    $q2 = "
        SELECT id, name
        FROM opportunities
        WHERE name = '{$name}'
        ORDER BY date_entered
    ";
    $r2 = $db->query($q2);

    $count = 0;
    while ($dup = $db->fetchByAssoc($r2)) {
        $count++;

        // Saltar el primero (original)
        if ($count == 1) continue;

        // Calcular el nuevo nombre
        $maxQ = "SELECT MAX(CAST(name AS UNSIGNED)) AS max_name FROM opportunities WHERE name REGEXP '^[0-9]+$'";
        $maxR = $db->fetchByAssoc($db->query($maxQ));
        $newName = $maxR['max_name'] + 1;

        // Actualizar el registro duplicado
        $upd = "UPDATE opportunities SET name = '{$newName}' WHERE id = '{$dup['id']}'";
        $db->query($upd);

        // Mostrar en tabla
        echo "<tr>
                <td>{$dup['id']}</td>
                <td>{$dup['name']}</td>
                <td>{$newName}</td>
              </tr>";

        $totalActualizados++;
    }
}

echo "</table>";
echo "<p><b>Total actualizados:</b> {$totalActualizados}</p>";
