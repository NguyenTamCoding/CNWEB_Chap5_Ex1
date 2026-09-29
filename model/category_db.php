<?php
//thao tác với danh mục db

//danh sach cac danh muc
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

//lấy tên danh mục theo id
function get_category_name($category_id) {
    global $db;
    $query = 'SELECT * FROM categories
              WHERE categoryID = :category_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $category_name = $category['categoryName'];
    return $category_name;
}

//thêm danh mục
function add_category($name) {
    global $db;
    $query = 'INSERT INTO categories (categoryName)
              VALUES (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();    
}

//xoá danh mục
function delete_category($category_id) {
    global $db;
    $query = 'DELETE FROM categories
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}

function get_category($category_id) {
    global $db;
    $query = 'SELECT * FROM categories
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    return $category;
}

function update_category($category_id, $name) {
    global $db;
    $query = 'UPDATE categories
              SET categoryName = :name
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}
?>