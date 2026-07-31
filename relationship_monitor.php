<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuiteCRM Data Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/datatables.net-bs5@1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- FontAwesome CSS for the eye icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        table {
            margin: 20px 0;
        }

        th,
        td {
            text-align: center;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <div class="container">

        <table id="dataTable" class="table table-striped table-bordered">


            <?php

            if (!defined('sugarEntry')) {
                define('sugarEntry', true);
            }

            include 'include/MVC/preDispatch.php';
            $startTime = microtime(true);
            require_once 'include/entryPoint.php';
            ob_start();
            require_once 'include/MVC/SugarApplication.php';

            if (!$_REQUEST['every']) {
            ?>
                <thead class="thead-dark">
                    <tr>
                        <th>Condicion</th>
                        <th>Total</th>
                        <th>Incidencia</th>
                        <th>Porcentaje Incidencia</th>
                        <th>Ultima Incidencia</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $relationships = "(('Opportunities','Leads'),('Contacts','EmailAddresses'),
                    ('srefu_Refund','Veta_Recibo'),
                    ('Contacts','Veta_Presupuesto'),
                    ('Contacts','Veta_Recibo'),
                    ('futpa_Scheduled_Payments','Veta_Recibo'),
                    ('Veta_Curso','Curso_DetallesCursos'),
                    ('Curso_DetallesCursos','Veta_Curso'),
                    ('Veta_Presupuesto','Veta_DetallePresupuesto'),
                    ('Veta_DetallePresupuesto','Veta_Presupuesto'),
                    ('Contacts','Veta_Abono'),
                    ('Veta_Abono','Contacts'),
                    ('Veta_Liquidacion','Veta_Loo'),
                    ('Leads','EmailAddresses'),
                    ('Veta_Cartera','Veta_Abono'),
                    ('Veta_Abono','Veta_Cartera'),
                    ('Doc_DocsSolicitados','Opportunities'),
                    ('Veta_LooCorreccion','Veta_Loo'),
                    ('Veta_Presupuesto','Veta_Requerimiento'),
                    ('Contacts','Opportunities'),
                    ('Opportunities','Contacts'),
                    ('futpa_Installment_Payments','Contacts'),
                    ('Veta_Recibo','Veta_DetalleRecibo'),
                    ('Veta_DetalleRecibo','Veta_Recibo'),
                    ('Veta_Presupuesto','Leads'),
                    ('srefu_Refund','srefu_Scheduled_Refund'),
                    ('srefu_Scheduled_Refund','srefu_Refund'),
                    ('Veta_Recibo','Leads'),
                    ('futpa_Scheduled_Payments','Veta_Aplicacion'),
                    ('Veta_TRM','Conta_TRM_History'),
                    ('Conta_TRM_History','Veta_TRM'),
                    ('Veta_Recibo','Veta_Presupuesto'),
                    ('Veta_Visa','Opportunities'),
                    ('srefu_Refund','Veta_Cartera'),
                    ('Veta_COE','Veta_Aplicacion'),
                    ('Veta_Liquidacion','Veta_Cartera'),
                    ('Leads','Veta_Requerimiento'),
                    ('Veta_Requerimiento','Leads'),
                    ('Users','EmailAddresses'),
                    ('Veta_PagoColegios','Opportunities'),
                    ('Veta_Devolucion','Veta_Recibo'),
                    ('Veta_Visa','Veta_ServicioCliente'),
                    ('Veta_Seguro','Auto_Seguro_Fee'),
                    ('Auto_Seguro_Fee','Veta_Seguro'),
                    ('Veta_Visas','Contacts'),
                    ('B2B_Convenios','EmailAddresses'),
                    ('Veta_Visas','Leads'),
                    ('KPI_KPI','KPI_Config'),
                    ('B2B_Other_Agencies','EmailAddresses'),
                    ('Veta_ServicioCliente','Opportunities'),
                    ('Doc_Documentos_Adic','Opportunities'),
                    ('Veta_Abono','Veta_Recibo'),
                    ('Veta_Aplicacion','Opportunities'),
                    ('Doc_Plantillas','Opportunities'),
                    ('Veta_Cartera','Veta_Recibo'),
                    ('Opportunities','Veta_Recibo'),
                    ('srefu_Scheduled_Refund','Veta_Cartera'),
                    ('Veta_TiposVisa','Auto_TiposVisa_Fee'),
                    ('Auto_TiposVisa_Fee','Veta_TiposVisa'),
                    ('Doc_DocsSolicitados','Doc_Documentos'),
                    ('Doc_Documentos','Doc_Plantillas'),
                    ('Veta_CorreccionCOE','Veta_COE'),
                    ('futpa_Scheduled_Payments','Veta_Cartera'),
                    ('Contacts','Veta_Requerimiento'),
                    ('Veta_Loo','Veta_Aplicacion'),
                    ('Opportunities','Contacts'),
                    ('Contacts','Opportunities'),
                    ('Veta_Recibo','Veta_Requerimiento'),
                    ('Veta_COE','Opportunities'),
                    ('Roles','Users'),
                    ('Veta_COE','Veta_Liquidacion')
                    )";
                    $query = "SELECT lhs_module as every, rhs_module as has,lhs_table as tablename,join_key_lhs as joinkey,join_table as jointable FROM relationships WHERE (lhs_module,rhs_module) IN $relationships AND join_table <> 'opportunities_contacts' 
                    UNION SELECT rhs_module as every, lhs_module as has,rhs_table as tablename,join_key_rhs as joinkey,join_table as jointable FROM relationships WHERE (rhs_module,lhs_module) IN $relationships AND join_table <> 'opportunities_contacts'";
                    $res = $db->query($query);
                    while ($row = $db->fetchByAssoc($res)) {
                        extract($row);
                        if (!$jointable) continue;
                        $subquery = "SELECT $joinkey FROM $jointable";
                        $querydetail = "SELECT count(*) as total,sum(id not in ($subquery)) as incidencias,max(IF(id not in ($subquery),date_entered,NULL)) as ultima_incidencia FROM $tablename WHERE date_entered > '2024-01-01'";
                        $resDetail = $db->query($querydetail);
                        if ($rowDetail = $db->fetchByAssoc($resDetail)) {
                            extract($rowDetail);
                            if (!$total) continue;
                            $porcentaje = round(100 * $incidencias / $total, 2);

                            // $todostr = $mod_strings[strtoupper("LBL_$every")];
                            // $tienestr = $mod_strings[strtoupper("LBL_$has")];
                            echo "<tr>
                                <td>Todo $every tiene $has <br>($jointable)</td>
                                <td> $total</td>
                                <td> $incidencias</td>
                                <td> $porcentaje%</td>
                                <td> $ultima_incidencia</td>
                                <td><a href='?every=$every&has=$has' class='btn btn-info'><i class='fas fa-eye'></i> ver</a></td>
                            </tr>";
                        }
                    }
                } else {
                    ?>
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Ir</th>
                        </tr>
                    </thead>
                <tbody>
                <?php
                    extract($_REQUEST);
                    $query = "SELECT lhs_module as every, rhs_module as has,lhs_table as tablename,join_key_lhs as joinkey,join_table as jointable FROM relationships WHERE (lhs_module,rhs_module) IN (('$every','$has')) AND join_table <> 'opportunities_contacts' 
                     UNION SELECT rhs_module as every, lhs_module as has,rhs_table as tablename,join_key_rhs as joinkey,join_table as jointable FROM relationships WHERE (rhs_module,lhs_module) IN (('$every','$has')) AND join_table <> 'opportunities_contacts'";
                    $res = $db->query($query);
                    if ($row = $db->fetchByAssoc($res)) {
                        extract($row);
                        $subquery = "SELECT $joinkey FROM $jointable";

                        $nameColumn = $tablename == 'contacts' || $tablename == 'users' || $tablename == 'leads' ? "TRIM(UPPER(CONCAT(IFNULL(first_name,' '), ' ', last_name)))" : 'name';
                        $querydetail = "SELECT id,$nameColumn as name,CONCAT('https://crm.vetaeducation.com/index.php?module=$every&action=DetailView&record=',id) as link FROM $tablename WHERE date_entered > '2024-01-01' AND id NOT IN ($subquery)";
                        $resDetail = $db->query($querydetail);
                        while ($rowDetail = $db->fetchByAssoc($resDetail)) {
                            extract($rowDetail);
                            $porcentaje = round(100 * $incidencias / $total, 2);

                            // $todostr = $mod_strings[strtoupper("LBL_$every")];
                            // $tienestr = $mod_strings[strtoupper("LBL_$has")];
                            echo "<tr>
                                <td>$id</td>
                                <td> $name</td>
                                <td><a href='$link' class='btn btn-info' target='_blank'><i class='fas fa-eye' ></i> Ir</a></td>
                            </tr>";
                        }
                    }
                }
                ?>
                </tbody>
        </table>
    </div>

    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.jsdelivr.net/npm/datatables.net@1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs5@1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // Initialize DataTables
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

</body>

</html>