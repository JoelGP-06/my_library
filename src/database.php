<?php

/**
 * returns true if email and password belongs to a user
 * @return: true
 * @params: email,password
 * 
 */
function authenticate(PDO $db, string $email, string $password): bool{
    $sql = "SELECT * FROM users WHERE email=:email LIMIT 1";
    $stmt = $db -> prepare($sql);

    if ($stmt->execute([':email' => $email])){
        $user = $stmt->fetch();
        if ($user){
            if (password_verify($password, $user['password'])){
                $_SESSION['user'] = $user;
                return true;
            }
            
        }
    }
    return false;
}

function connectSqlite(string $dbname): PDO
{
    try {
        $db = new PDO('sqlite:' . __DIR__ . '/db/' . $dbname);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
// $dsn ="mysql:host=127.0.0.1;dbname=base;"
function connectMysql(string $dsn, string $userdb, string $passdb)
{
    try {
        $db = new PDO($dsn, $userdb, $passdb);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    return $db;
}

function query(PDO $db, string $sql, array $data = null)
{
    $stmt = $db->prepare($sql);
    if ($data) {
        if (is_array($data)) {
            $stmt->execute($data);
        }
    } else {
        $stmt->execute();
    }

    $nrows=getRowCount($db, $sql, $data);

    if($nrows>1){
        $items=$stmt->fetchAll();
    }else{
        $items=$stmt->fetch();
    }
    return $items;
}

function getRowCount(PDO $db, string $sql, ?array $params):int {
    $countSql="SELECT COUNT(*) FROM (".$sql.")";

    $stmt=$db->prepare($countSql);

    if(is_array($params)){
        $stmt->execute($params);
    }else{
        $stmt->execute();
    }

    return (int)$stmt->fetchColumn();
}

function insert(PDO $db,$table,$data):bool 
{
    if (is_array($data)){
        $columns='';$bindv='';$values=null;
        foreach ($data as $column => $value) {
            $columns.='`'.$column.'`,';
            $bindv.='?,';
            $values[]=$value;
        }
        $columns=substr($columns,0,-1);
        $bindv=substr($bindv,0,-1);
              
        $sql="INSERT INTO {$table}({$columns}) VALUES ({$bindv})";
            
        try{
            $stmt=$db->prepare($sql);

            $stmt->execute($values);
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }   
        return true;
    }
    return false;
}
// funció de selecció de  tots els registres
// pots indicar quins camps vols mostrar
function select(PDO $db,$table,array $fields=null):array
{
    if (is_array($fields)){
        $columns=implode(',',$fields);
                
    }else{
        $columns="*";
    }
            
    $sql="SELECT {$columns} FROM {$table}";
           
    $stmt=$db->prepare($sql);
    $stmt->execute();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function delete(PDO $db, string $table, array $data): bool
{
    // Comprobamos que haya condiciones para borrar (evita borrar toda la tabla sin querer)
    if (!is_array($data) || empty($data)) {
        return false;
    }

    // Construimos la parte del WHERE dinámicamente
    $conditions = '';
    $values = [];
    foreach ($data as $column => $value) {
        $conditions .= "`$column` = ? AND "; // Creamos la condición con placeholders
        $values[] = $value; // Guardamos el valor que irá en el execute()
    }
    // Eliminamos el último "AND"
    $conditions = substr($conditions, 0, -5);

    // Montamos la sentencia SQL completa
    $sql = "DELETE FROM {$table} WHERE {$conditions}";

    try {
        // Preparamos la sentencia
        $stmt = $db->prepare($sql);
        // Ejecutamos sustituyendo los ? por los valores del array
        $stmt->execute($values);
        return true;
    } catch (PDOException $e) {
        // Mostramos el error en caso de fallo
        echo $e->getMessage();
        return false;
    }
}


function update(PDO $db, string $table, array $data, array $where): bool
{
    // Necesitamos datos para actualizar y condiciones para localizar los registros
    if (empty($data) || empty($where)) {
        return false;
    }

    // Construimos la parte SET con placeholders
    $set = '';
    $values = [];
    foreach ($data as $column => $value) {
        $set .= "`$column` = ?, "; // campo = ?
        $values[] = $value; // valor a sustituir en el execute()
    }
    // Quitamos la última coma
    $set = substr($set, 0, -2);

    // Construimos el WHERE
    $conditions = '';
    foreach ($where as $column => $value) { 
        $conditions .= "`$column` = ? AND ";
        $values[] = $value; // añadimos también las condiciones al array de valores
    }
    // Quitamos el último AND
    $conditions = substr($conditions, 0, -5);

    // Montamos la sentencia final
    $sql = "UPDATE {$table} SET {$set} WHERE {$conditions}";

    try {
        // Preparamos y ejecutamos
        $stmt = $db->prepare($sql);
        $stmt->execute($values);
        return true;
    } catch (PDOException $e) {
        // Mostramos error si falla
        echo $e->getMessage();
        return false;
    }
}

/**
 * Verifica si un usuario ya existe por su email.
 */
function userExists(PDO $db, string $email): bool {
    $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->execute([':email' => $email]);
    $count = (int)$stmt->fetchColumn();
    return $count > 0;
}

