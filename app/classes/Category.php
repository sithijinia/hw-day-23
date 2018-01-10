<?php

namespace App\classes;

use App\classes\Database;

class Category
{
    public function saveCategories($data)
    {

        $sql = "INSERT INTO categories (name,description,status)
                VALUES ('$data[category_name]','$data[category_description]','$data[status]')";

        if (mysqli_query(Database::dbConnection(), $sql)) {
            $message = "Category Saved Successfully.";
            return $message;

        } else {
            die("Query Problem " . mysqli_error(Database::dbConnection()));


        }
    }
    public function showCategories($data){
        $sql = "SELECT * FROM categories";

        if (mysqli_query(Database::dbConnection(),$sql)){

            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else {
            die("Query Problem " . mysqli_error(Database::dbConnection()));


        }
    }

    public function getCategoryById($id){
        $sql = "SELECT *FROM categories WHERE id='$id'";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result =mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }
        else{
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }
    }
    public function updateCategory($data){
        $sql = "UPDATE categories SET name='$data[category_name]',description ='$data[category_description]', status='$data[status]' WHERE id = '$data[id]'";
        if(mysqli_query(Database::dbConnection(),$sql)){
            header('Location:manage-category.php');
        }
        else{
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }
    }
    public function deleteCategory($id){
        $sql = "DELETE FROM categories WHERE id = '$id'";
        if(mysqli_query(Database::dbConnection(),$sql)) {
            $message = "Category delete successfully.";
            return $message;

        }
        else{
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }

    }
}