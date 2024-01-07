<?php

function connect() {
    $pdo = new \PDO('mysql:host=localhost;dbname=gallery;charset=utf8', 'root', '');
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);

    return $pdo;
}

function create($table, $fields) {
    $pdo = connect();

    if(!is_array($fields)) {
        $fields = (array) $fields;
    }

    $sql = "INSERT INTO {$table}";
    $sql .= "(" . implode(',', array_keys($fields)) . ")";
    $sql .= " VALUES(" . ':' . implode(',:', array_keys($fields)) . ")";

    $insert = $pdo->prepare($sql);

    return $insert->execute($fields);
}

function update($table, $fields, $where) {
    if(!is_array($fields)) {
        $fields = (array) $fields;
    }

    $pdo = connect();

    $data = array_map(function($field) {
        return "{$field} = :{$field}";
    }, array_keys($fields));

    $sql = "UPDATE {$table} SET ";

    $sql .= implode(',', $data);

    $sql .= " WHERE {$where[0]} = :{$where[0]}";

    $data = array_merge($fields, [$where[0] => $where[1]]);

    $update = $pdo->prepare($sql);
    $update->execute($data);

    return $update->rowCount();
}

function all($table, $order = null) {
    $pdo = connect();

    $sql = "SELECT * FROM {$table}";
    
    if($order != null) {
        if(strtoupper($order) == "ASC" || strtoupper($order) == "DESC") {
            $sql .= " ORDER BY id {$order}";
        }
    }

    $list = $pdo->query($sql);

    $list->execute();

    return $list->fetchAll();
}

function find($table, $field, $value, $fetch = null) {
    $pdo = connect();

    // $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);

    $sql = "SELECT * FROM {$table} WHERE {$field} = :{$field}";

    $find = $pdo->prepare($sql);
    $find->bindValue($field, $value);
    $find->execute();

    if($fetch == 'all') {
        return $find->fetchAll();
    }

    return $find->fetch();
}
function like($table, $field, $value) {
    $pdo = connect();

    $sql = "SELECT * FROM {$table} WHERE {$field} LIKE :value";
    $find = $pdo->prepare($sql);
    $find->bindValue(':value', "%{$value}%", PDO::PARAM_STR);
    $find->execute();

    return $find->fetchAll();
}
function counting($table, $where = null, $value = null) {
    $pdo = connect();
    
    $sql = "SELECT id FROM {$table}";
    
    if($where !== null) {
        $sql .= " WHERE {$where} = {$value}";
    }
   
    $count = $pdo->prepare($sql);
    $count->execute();

    return $count->rowCount();
}
function delete($table, $field, $id) {
    $pdo = connect();

    $sql = "DELETE FROM {$table} WHERE {$field} = :{$field}";
    $delete = $pdo->prepare($sql);
    $delete->bindValue($field, $id);
    return $delete->execute();
}
?>