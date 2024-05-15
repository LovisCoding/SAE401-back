<?php

namespace App\Controller;

use App\Model\EtudiantModel;

class EtudiantController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function index(): void
    {
        // Create a new EtudiantModel instance to access the model layer
        $model = new EtudiantModel();
        
        // Call EtudiantModel getAll() method to get all records
        $model->getAll();
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function show(int $id): void
    {
        // Create a new EtudiantModel instance to access the model layer
        $model = new EtudiantModel();
        // Call EtudiantModel getAll() method to get all records
        $model->get($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }
}