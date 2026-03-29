<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\StudentModel;

class StudentApi extends ResourceController
{
    use ResponseTrait;

    // This tells the controller which model to use automatically
    protected $modelName = 'App\Models\StudentModel';
    protected $format    = 'json';

    /**
     * Return an array of resource objects, themselves in JSON
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->model->findAll();
        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            return $this->respond($data);
        }
        return $this->failNotFound('No student found with id ' . $id);
    }
}