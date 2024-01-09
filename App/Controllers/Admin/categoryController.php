<?php
// categoriesController.php
namespace App\Controllers;
use App\Models\CategoryModel;


class CategoriesController {
    // Méthode pour afficher la liste des catégories
    public function listCategories() {
        // Inclure le modèle des catégories
        require_once('../../Models/CategoryModel.php');

        // Utiliser la fonction pour récupérer la liste des catégories
        $categories = CategoryModel::getAllCategories();

        // Charger la vue pour afficher la liste des catégories
        include('../../../Views/dashboard/store.php');
    }
}
