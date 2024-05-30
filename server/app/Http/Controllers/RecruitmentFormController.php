<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecruitmentForm;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class RecruitmentFormController extends Controller
{
    // Define authentication token
    private $token = '9a427cc86da49dca6cc372a4d2992c91bc943a0f';

    // Display a listing of the resource
    public function index()
    {
        // Paginate and retrieve recruitment forms
        $recruitments = RecruitmentForm::paginate(25);
        // Return view with recruitment forms
        return view('dashboard', compact('recruitments'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // Check if the provided token matches the generated token
        $authorizationHeader = $request->header('Authorization');
        $token = str_replace('Bearer ', '', $authorizationHeader); 
        if ($token !== $this->token) {
            // Return unauthorized error
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:recruitment_forms',
            'phone_number' => 'required|string|max:32',
            'short_introduction' => 'required|string|max:100',
            'age' => 'required|numeric',
            'city' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'degree' => 'required|string|in:High School,Associate,Bachelor,Master,Doctorate',
            'years_of_experience' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png|max:2048',
            'resume' => 'required|file|mimes:pdf|max:2048',
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Store uploaded photo and resume files
        $photoPath = $request->file('photo')->store('photos', 'public');
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Create a new recruitment form record
        $form = RecruitmentForm::create($request->only([
            'first_name', 'last_name', 'email', 'phone_number', 'short_introduction',
            'age', 'city', 'field_of_study', 'degree', 'years_of_experience'
        ]) + ['photo_path' => $photoPath, 'resume_path' => $resumePath]);

        // Return success response with created form data
        return response()->json(['status'=> 'success'], 201);
    }

    // Remove the specified resource from storage
    public function destroy(string $id)
    {
        // Retrieve the recruitment form from the database
        $recruitmentForm = RecruitmentForm::find($id);
        
        // If recruitment form is not found, return error response
        if (!$recruitmentForm) {
            return redirect()->back()->with('error', 'RecruitmentForm not found.');
        }

        // Construct paths for photo and resume files
        $photoPath = storage_path('app/public/' . $recruitmentForm->photo_path);
        $resumePath = storage_path('app/public/' . $recruitmentForm->resume_path);

        // Delete photo file if it exists
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        // Delete resume file if it exists
        if (file_exists($resumePath)) {
            unlink($resumePath);
        }

        // Delete the recruitment form from the database
        $recruitmentForm->delete();

        // Redirect with success message
        return redirect()->back()->with('success', 'RecruitmentForm deleted successfully.');
    }
}
