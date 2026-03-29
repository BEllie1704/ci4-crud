<?php

namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\Controller;

class StudentController extends Controller
{
    // Step 7: Display list with Pagination
    public function index()
    {
        $model = new StudentModel();

        $data = [
            'students' => $model->paginate(5),
            'pager'    => $model->pager,
        ];

        return view('students/index', $data);
    }

    // Step 5: Show the Create Form
    public function create()
    {
        return view('students/create');
    }

    // Step 5: Save the new student to Database
    public function store()
    {
        $model = new StudentModel();

        $model->save([
            'name'   => $this->request->getPost('name'),
            'email'  => $this->request->getPost('email'),
            'course' => $this->request->getPost('course'),
        ]);

        return redirect()->to('/students')->with('status', 'Student added successfully');
    }

    // NEW: Show the form with existing data for editing
    public function edit($id = null)
    {
        $model = new StudentModel();
        $data['student'] = $model->find($id);

        if (!$data['student']) {
            return redirect()->to('/students')->with('status', 'Student not found');
        }

        return view('students/edit', $data);
    }

    // NEW: Save the updated data
    public function update($id = null)
    {
        $model = new StudentModel();
        
        $model->update($id, [
            'name'   => $this->request->getPost('name'),
            'email'  => $this->request->getPost('email'),
            'course' => $this->request->getPost('course'),
        ]);

        return redirect()->to('/students')->with('status', 'Student updated successfully');
    }

    // Step 9: Soft Delete a student
    public function delete($id = null)
    {
        $model = new StudentModel();
        
        // Performs a Soft Delete because $useSoftDeletes is true in the Model
        $model->delete($id);

        return redirect()->to('/students')->with('status', 'Student deleted successfully (Soft Delete)');
    }
}