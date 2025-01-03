<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DepartmentModel;
use App\Models\DeptosylModel;

use App\Models\SubjectModel;
use App\Models\SemesterModel;
use App\Models\SyllabusModel;
use App\Models\DepartmentAndSyllabusModel;
use App\Models\SlideModel;

class Courses extends Controller
{

    protected $departmentModel;
    protected $deptosylModel;
    protected $syllabusModel;
    protected $subjectModel;
    protected $semesterModel;
    protected $departmentAndSyllabusModel;
    protected $slideModel;

    public function __construct()
    {
        $this->departmentModel = new DepartmentModel();
        $this->deptosylModel = new DeptosylModel();
        $this->syllabusModel = new SyllabusModel();
        $this->subjectModel = new SubjectModel();
        $this->semesterModel = new SemesterModel();
        $this->slideModel = new SlideModel();
        $this->departmentAndSyllabusModel = new DepartmentAndSyllabusModel();
    }


   // Method to retrieve and display all syllabuses
   public function index()
   {
       // Initialize Syllabus Model
       $departmentModel = new DepartmentModel();

       // Retrieve all department
       $department = $departmentModel->findAll();

       // Pass department to the view
       return view('dashboard/courses/index_department', [
           'department' => $department


       
       ]);
   }


   public function department_syllabus($department_id)
{
    $departmentModel = new DepartmentModel();
    $deptosylModel = new DeptosylModel();

    // Get the department details
    $department = $departmentModel->find($department_id);

    // Fetch search query from GET request
    $searchQuery = $this->request->getGet('query');

    if (!empty($searchQuery)) {
        // Perform a search based on syllabus name
        $syllabuses = $deptosylModel->like('syllabus.syllabus_name', $searchQuery)
                                    ->getSyllabusesByDepartment($department_id);
    } else {
        // Retrieve all syllabuses for this department
        $syllabuses = $deptosylModel->getSyllabusesByDepartment($department_id);
    }

    // Pass data to the view
    return view('dashboard/courses/index_syllabus', [
        'department' => $department,
        'syllabuses' => $syllabuses,
        'searchQuery' => $searchQuery, // Optional: Keep the search term in the input box
    ]);
}


public function syllabus_subjects($department_id, $syllabus_id)
{
    // Initialize models
    $departmentModel = new DepartmentModel();
    $syllabusModel = new SyllabusModel();
    $subjectModel = new SubjectModel();

    // Get department details
    $department = $departmentModel->find($department_id);

    // Get syllabus details
    $syllabus = $syllabusModel->find($syllabus_id);

    // Get the search query from the GET request
    $searchQuery = $this->request->getGet('query');

    // Get subjects grouped by semester
    if (!empty($searchQuery)) {
        // If there is a search query, filter the subjects by subject_code
        $subjects = $subjectModel->like('subject_code', $searchQuery)
                                 ->where('department_id', $department_id)
                                 ->where('syllabus_id', $syllabus_id)
                                 ->orderBy('semester.semester_number')
                                 ->join('semester', 'semester.semester_id = subject.semester_id')
                                 ->findAll();
    } else {
        // If there is no search query, fetch all subjects for this department and syllabus
        $subjects = $subjectModel->getSubjectsBySemester($department_id, $syllabus_id);
    }

    // Group subjects by semester
    $subjectsBySemester = [];
    foreach ($subjects as $subject) {
        $subjectsBySemester[$subject['semester_number']][] = $subject;
    }

    // Pass data to the view
    return view('dashboard/courses/index_subject', [
        'department' => $department,
        'syllabus' => $syllabus,
        'subjectsBySemester' => $subjectsBySemester,
        'searchQuery' => $searchQuery, // Pass the search query to keep it in the input field
    ]);
}


    public function create_department(){
        
        {
            // This method loads the 'create_department.php' view
            return view('dashboard/courses/create_department');
        }
        
    }

    public function store_department()
    {
        // Load the Department model
        $departmentModel = new DepartmentModel();
    
        // Get the department ID (if manually entered) and department name from the form input
        $departmentName = $this->request->getPost('department_name');
        $departmentId = $this->request->getPost('department_id');
    
        // Prepare data to insert
        $data = [
            'department_name' => $departmentName
        ];
    
        // If department ID is entered manually, add it to the data array
        if ($departmentId) {
            $data['department_id'] = $departmentId;
        }
    
        // Insert the new department into the database
        if ($departmentModel->save($data)) {
            return redirect()->to(base_url('courses'))->with('success', 'Department created successfully.');
        } else {
            return redirect()->to(base_url('courses/create_department'))->with('error', 'Failed to create department.');
        }
    }
    
    public function edit_department($department_id)
{
    // Load the Department model
    $departmentModel = new DepartmentModel();

    // Find the department by ID
    $department = $departmentModel->find($department_id);

    // Check if the department exists
    if (!$department) {
        return redirect()->to(base_url('courses'))->with('error', 'Department not found.');
    }

    // Pass department data to the edit view
    return view('dashboard/courses/edit_department', [
        'department' => $department,
    ]);
}


public function update_department($department_id)
{
    // Load the Department model
    $departmentModel = new DepartmentModel();

    // Get updated department name from the form input
    $departmentName = $this->request->getPost('department_name');

    // Validate input
    if (empty($departmentName)) {
        return redirect()->back()->with('error', 'Department name is required.');
    }

    // Update the department in the database
    $data = [
        'department_name' => $departmentName,
    ];

    if ($departmentModel->update($department_id, $data)) {
        return redirect()->to(base_url('courses'))->with('success', 'Department updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to update department.');
    }
}


    public function delete_department($department_id)
{
    // Initialize the Department model and DepartmentAndSyllabus model
    $departmentModel = new DepartmentModel();
    $departmentAndSyllabusModel = new DepartmentAndSyllabusModel();
    $subjectModel = new SubjectModel(); // Add the Subject model

    // Find the department to be deleted
    $department = $departmentModel->find($department_id);

    if ($department) {
        // Delete the related subjects first
        $subjectModel->where('department_id', $department_id)->delete();

        // Delete the related records from departmentandsyllabus table
        $departmentAndSyllabusModel->where('department_id', $department_id)->delete();

        // Then delete the department
        $departmentModel->delete($department_id);

        // Redirect to the department index page with a success message
        return redirect()->to(base_url('courses'))->with('success', 'Department and related syllabus deleted successfully.');
    } else {
        // If the department doesn't exist, redirect with an error message
        return redirect()->to(base_url('courses'))->with('error', 'Department not found.');
    }
}

public function search_department()
{
    $departmentModel = new DepartmentModel();

    // Fetch the search query from the GET request
    $searchQuery = $this->request->getGet('query');

    if (!empty($searchQuery)) {
        // Use `like` query to filter by department name
        $departments = $departmentModel->like('department_name', $searchQuery)->findAll();
    } else {
        // If no search query, fetch all departments
        $departments = $departmentModel->findAll();
    }

    // Load the same view as `index_department` with filtered data
    return view('dashboard/courses/index_department', [
        'department' => $departments,
        'searchQuery' => $searchQuery, // Optional, to display the query in the input field
    ]);
}


public function store_syllabus($department_id)
{
    // Load models
    $deptosylModel = new DeptosylModel();
    $syllabusModel = new SyllabusModel();

    // Get form data
    $syllabusName = $this->request->getPost('syllabus_name');
    $syllabusYear = $this->request->getPost('syllabus_year');

    // Validate input
    if (empty($syllabusName) || empty($syllabusYear)) {
        return redirect()->back()->with('error', 'All fields are required.');
    }

    // Add the syllabus
    $syllabusData = [
        'syllabus_name' => $syllabusName,
        'syllabus_year' => $syllabusYear,
    ];

    if ($syllabusModel->insert($syllabusData)) {
        $syllabusId = $syllabusModel->insertID();

        // Link syllabus to the department
        $deptosylModel->insert([
            'department_id' => $department_id,
            'syllabus_id' => $syllabusId,
        ]);

        return redirect()->to(base_url('courses/department_syllabus/' . $department_id))->with('success', 'Syllabus added successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to add syllabus.');
    }
}


public function delete_syllabus($department_id, $syllabus_id)
{
    // Load the models
    $deptosylModel = new DeptosylModel();
    $subjectModel = new SubjectModel(); // Assuming subjects are linked to syllabuses
    $syllabusModel = new SyllabusModel();

    // Check if the syllabus exists
    $syllabus = $syllabusModel->find($syllabus_id);
    if (!$syllabus) {
        return redirect()->to(base_url('courses/department_syllabus/' . $department_id))
                         ->with('error', 'Syllabus not found.');
    }

    // Delete related subjects first
    $subjectModel->where('syllabus_id', $syllabus_id)->delete();

    // Delete the syllabus-department association
    $deptosylModel->where('syllabus_id', $syllabus_id)
                  ->where('department_id', $department_id)
                  ->delete();

    // Delete the syllabus itself
    if ($syllabusModel->delete($syllabus_id)) {
        return redirect()->to(base_url('courses/department_syllabus/' . $department_id))
                         ->with('success', 'Syllabus deleted successfully.');
    } else {
        return redirect()->to(base_url('courses/department_syllabus/' . $department_id))
                         ->with('error', 'Failed to delete syllabus.');
    }
}



public function add_new_syllabus($department_id)
{
    // Load the Department model
    $departmentModel = new DepartmentModel();

    // Get the department details
    $department = $departmentModel->find($department_id);

    // Check if the department exists
    if (!$department) {
        return redirect()->to(base_url('courses'))->with('error', 'Department not found.');
    }

    // Load the form view
    return view('dashboard/courses/add_new_syllabus', [
        'department' => $department,
    ]);
}

public function edit_syllabus($department_id, $syllabus_id)
{
    // Load models
    $departmentModel = new DepartmentModel();
    $syllabusModel = new SyllabusModel();

    // Get department and syllabus details
    $department = $departmentModel->find($department_id);
    $syllabus = $syllabusModel->find($syllabus_id);

    // Check if syllabus exists
    if (!$syllabus) {
        return redirect()->to(base_url('courses/department_syllabus/' . $department_id))
                         ->with('error', 'Syllabus not found.');
    }

    // Pass data to the view
    return view('dashboard/courses/edit_syllabus', [
        'department' => $department,
        'syllabus' => $syllabus
    ]);
}

public function update_syllabus($department_id, $syllabus_id)
{
    // Load Syllabus model
    $syllabusModel = new SyllabusModel();

    // Validate the form inputs
    $syllabusName = $this->request->getPost('syllabus_name');
    $syllabusYear = $this->request->getPost('syllabus_year');

    if (empty($syllabusName) || empty($syllabusYear)) {
        return redirect()->back()->with('error', 'All fields are required.');
    }

    // Update the syllabus
    $data = [
        'syllabus_name' => $syllabusName,
        'syllabus_year' => $syllabusYear
    ];

    if ($syllabusModel->update($syllabus_id, $data)) {
        return redirect()->to(base_url('courses/department_syllabus/' . $department_id))
                         ->with('success', 'Syllabus updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to update syllabus.');
    }
}

 public function add_subject($department_id, $syllabus_id)
{
    // Fetch department data
    $department = $this->departmentModel->find($department_id);
    
    // Fetch syllabus data
    $syllabus = $this->syllabusModel->find($syllabus_id);
    
    // Fetch all semesters
    $semesters = $this->semesterModel->findAll();
    
    // Pass data to the view
    return view('dashboard/courses/add_new_subject', [
        'department' => $department,
        'syllabus' => $syllabus,
        'semesters' => $semesters,
    ]);
}
public function store_subject()
{
    // Validate input
    $validation = $this->validate([
        'subject_code' => 'required|max_length[10]',
        'subject_name' => 'required|max_length[100]',
        'semester_id' => 'required|is_natural_no_zero',
        'department_id' => 'required|is_natural_no_zero',
        'syllabus_id' => 'required|is_natural_no_zero',
    ]);

    if (!$validation) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Save the subject
    $this->subjectModel->save([
        'subject_code' => $this->request->getPost('subject_code'),
        'subject_name' => $this->request->getPost('subject_name'),
        'semester_id' => $this->request->getPost('semester_id'),
        'department_id' => $this->request->getPost('department_id'),
        'syllabus_id' => $this->request->getPost('syllabus_id'),
    ]);

    return redirect()->to('courses/syllabus_subjects/' . $this->request->getPost('department_id') . '/' . $this->request->getPost('syllabus_id'))
                     ->with('success', 'Subject added successfully.');
}


public function index_subject($department_id, $syllabus_id)
{
    // Fetch department data
    $department = $this->departmentModel->find($department_id);

    // Fetch syllabus data
    $syllabus = $this->syllabusModel->find($syllabus_id);

    // Fetch subjects
    $subjects = $this->subjectModel
        ->select('subjects.*, semesters.semester_number')
        ->join('semesters', 'semesters.semester_id = subjects.semester_id')
        ->where('subjects.department_id', $department_id)
        ->where('subjects.syllabus_id', $syllabus_id)
        ->findAll();

    // Pass data to the view
    return view('courses/index_subject', [
        'department' => $department,
        'syllabus' => $syllabus,
        'subjects' => $subjects,
    ]);
}

public function delete_subject($subject_id)
{
    // Load models
    $subjectModel = new SubjectModel();

    // Check if the subject exists
    $subject = $subjectModel->find($subject_id);
    if (!$subject) {
        return redirect()->to('/courses/department_syllabus')->with('error', 'Subject not found.');
    }

    // Delete the subject
    if ($subjectModel->delete($subject_id)) {
        return redirect()->to('/courses/department_syllabus/' . $subject['department_id'] . '/' . $subject['syllabus_id'])->with('success', 'Subject deleted successfully.');
    } else {
        return redirect()->to('/courses/department_syllabus/' . $subject['department_id'] . '/' . $subject['syllabus_id'])->with('error', 'Failed to delete the subject.');
    }
}


    // Edit Subject
    public function edit_subject($id)
    {
        $subject = $this->subjectModel->find($id);
        if (!$subject) {
            return redirect()->to('/courses')->with('error', 'Subject not found');
        }

        return view('dashboard/courses/edit_subject', ['subject' => $subject]);
    }

    // Update Subject
    public function update_subject($id)
    {
        $subject = $this->subjectModel->find($id);
        if (!$subject) {
            return redirect()->to('/courses')->with('error', 'Subject not found');
        }

        $data = [
            'subject_code' => $this->request->getPost('subject_code'),
            'subject_name' => $this->request->getPost('subject_name')
        ];

        $this->subjectModel->update($id, $data);

        return redirect()->to('/courses')->with('success', 'Subject updated successfully');
    }


    // View Slides for a Subject
public function view_slides($subjectId)
{
    $subject = $this->subjectModel->find($subjectId);
    $slides = $this->slideModel->where('subject_id', $subjectId)->findAll();

    $data = [
        'subject' => $subject,
        'slides' => $slides
    ];

    return view('dashboard/courses/index_slides', $data);
}

// Add Slide
public function add_slide($subject_id)
{
    // Load the necessary models
    $subjectModel = new \App\Models\SubjectModel();
    
    // Fetch the subject data by its ID
    $subject = $subjectModel->getSubjectById($subject_id);
    
    // Check if the subject exists
    if (!$subject) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Subject not found');
    }
    
    // Pass the subject data to the view
    return view('dashboard/courses/add_slide', ['subject' => $subject]);
}
public function save_slide($subject_id)
{
    // Check if the file is uploaded by checking for the 'slide_file' input field
    if (!$this->request->getFile('slide_file')->isValid()) {
        return redirect()->back()->with('error', 'No file selected or invalid file upload!');
    }

    // Get the uploaded file
    $file = $this->request->getFile('slide_file');

    // Generate a unique file name and move the file to the correct location
    $newName = $file->getRandomName();
    $filePath = 'uploads/slides/' . $newName;
    $file->move(WRITEPATH . 'uploads/slides', $newName);

    // Prepare the data to insert into the database
    $data = [
        'subject_id' => $subject_id,
        'topic' => $this->request->getVar('topic'),
        'file_name' => $filePath,  // Store the relative path
    ];

    // Load the model and insert the data
    $slideModel = new \App\Models\SlideModel();
    $result = $slideModel->insert_slide($data, $filePath);

    // Check for success or failure
    if (isset($result['error'])) {
        return redirect()->back()->with('error', $result['error']);
    }

    // Redirect to the slide page
    return redirect()->to('/courses/view_slides/' . $subject_id)->with('success', 'Slide added successfully!');
}

    // Add download method for the slide file
  // In your controller (e.g., Courses.php)
public function download_slide($file_name)
{
    // Define the file path where the uploaded slides are stored
    $filePath = WRITEPATH . 'uploads/slides/' . $file_name; // Adjust path if needed

    // Check if the file exists
    if (!is_file($filePath)) {
        // If the file doesn't exist, throw an exception or show an error message
        throw new \CodeIgniter\Exceptions\PageNotFoundException('File not found.');
    }

    // Force the browser to download the file
    return $this->response->download($filePath, null); // The second parameter is the download filename (null to use the original filename)
}

    


    



// Edit Slide
public function edit_slide($id)
    {
        $slideModel = new SlideModel();
        $slide = $slideModel->find($id);

        if (!$slide) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Slide not found');
        }

        // Pass the current slide data to the view
        return view('dashboard/courses/edit_slide', ['slide' => $slide]);
    }

    // Method to handle saving (updating) a slide
    public function update_slide($id)
    {
        $slideModel = new SlideModel();

        // Fetch the slide from the database
        $slide = $slideModel->find($id);

        if (!$slide) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Slide not found');
        }

        // Get the new data from the form (topic and optional file upload)
        $data = [
            'topic' => $this->request->getPost('topic'),  // Get topic from the form
        ];

        // Check if a file is uploaded
        $file = $this->request->getFile('slide_file');

        if ($file && $file->isValid()) {
            // Move the uploaded file to the correct directory
            $filePath = 'uploads/slides/' . $file->getName();
            $file->move(ROOTPATH . 'public/' . $filePath);
            $data['file_name'] = $file->getName();  // Store the file name in the database
        }

        // Get the subject_id from the current slide
        $subject_id = $slide['subject_id'];

        // Update the slide in the database
        $slideModel->update($id, $data);

        // Redirect back to the slides page with a success message
        return redirect()->to(base_url('courses/view_slides/' . $subject_id))->with('success', 'Slide updated successfully');
    }
// Delete Slide
public function delete_slide($slideId)
{
    $slide = $this->slideModel->find($slideId);
    $this->slideModel->delete($slideId);
    return redirect()->to('/courses/view_slides/' . $slide['subject_id']);
}



}