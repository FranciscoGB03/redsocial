<?php
# verifica que exista una petición POST
if($_POST){
    include_once 'config.php';
    # aquí van las validaciones
    if(empty($_POST['tipo_transaccion'])) exit('Selecciona el tipo de transacción');
    if(empty($_POST['cuenta'])) exit('Escribe el número de cuenta');
    if(strlen($_POST['cuenta']) != 10) exit('EL número de cuenta debe tener 10 dpigitos');
    if(empty($_POST['monto'])) exit('Escribe el monto de la transacción');
    # selecciono el ID del cajero con menos transacciones, si todos tienen el mismo número de transacciones me devuelve el último ID insertado
    $cajero = $query->select('id', 'cajero', '1', 'ORDER BY contador, id ASC LIMIT 1');
    # reviso qué información trae $cajero
    # var_dump($cajero);
    # preparo el valor del monto, si es depósito es positivo, si es retiro es negativo
    $monto = ($_POST['tipo_transaccion'] == 'd') ? $_POST['monto'] : -1 * $_POST['monto'] ;
    # inserto en la DB
    $insert = $query->insert('transaccion', 'fecha, monto, cuenta, cajero', 'NOW(),'.$monto.','.$_POST['cuenta'].','.$cajero->id);
    # si el insert es correct, muestra mensaje y actualiza contador de cajero
    if($insert) {
        $query->update('cajero', 'contador = contador + 1', 'id = '.$cajero->id);
        echo '<h3>Transacción agregada correctamente.</h3>';
    }
    # consulto todos los cajeros
    $cajeros = $query->select('*', 'cajero');
    # recorro los cajeros
    foreach ($cajeros as $c){
        // saco transacciones por cajero
        $txs = $query->select('*', 'transaccion', 'cajero = '.$c->id);
        if($txs){ // si tiene transacciones
            echo '<h3>'.$c->nombre.'</h3><h5>Transacciones: '.$c->contador.'</h5>';
            echo '<table border="1">';
            // variable para calcular el total de operaciones
            $suma = 0;
            // si es una transacción
            if(count($txs) == 1){
                $suma = $txs->monto;
                echo '<tr><td>'.$txs->fecha.'</td><td>'.$txs->cuenta.'</td><td>$'.number_format($txs->monto).'</td></tr>';
            }else{
                // recorro transacciones
                foreach($txs as $tx){
                    $suma += $tx->monto;
                    echo '<tr><td>'.$tx->fecha.'</td><td>'.$tx->cuenta.'</td><td>$'.number_format($tx->monto).'</td></tr>';
                }
            }
            echo '</table>';
            echo '<p>Total: <strong>$'.number_format($suma).'</strong></p>';
        }        
        echo '<hr>';
    }
    
    
}
?>

