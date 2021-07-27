<?php

namespace App\Http\Controllers;

use App\Course;
use App\Employee;
use App\Experince;
use App\Family;
use App\Gender;
use App\Status;
use App\University;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['gender', 'status'])->orderBy('id', 'desc')->paginate(10);
        return view('frontend.index', compact('employees'));
    }

    public function create()
    {
        $genders = Gender::all()->pluck('name', 'id');
        $statuses = Status::all()->pluck('status', 'id');
        return view('frontend.add_employee', compact('genders', 'statuses'));
    }

    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'job_number' => 'required',
            'major' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'hire_date' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'gender_id' => 'required',
            'status_id' => 'required',
            'photo' => 'required',

        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $file_extension = $request->photo->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'images/employees';
        $request->photo->move($path, $file_name);


        $data['name'] = $request->name;
        $data['job_number'] = $request->job_number;
        $data['major'] = $request->major;
        $data['mobile'] = $request->mobile;
        $data['email'] = $request->email;
        $data['hire_date'] = $request->hire_date;
        $data['birthdate'] = $request->birthdate;
        $data['address'] = $request->address;
        $data['gender_id'] = $request->gender_id;
        $data['status_id'] = $request->status_id;
        $data['photo'] = $file_name;


        $employee = Employee::create($data);
        if ($request->university_name) {
            $university = new University([
                'qualification' => $request->qualification,
                'major' => $request->major,
                'university_name' => $request->university_name,
                'specialization_history' => $request->specialization_history
            ]);
            $employee->universities()->save($university);
        }


        if ($request->course_name) {
            $course = new Course([
                'course_name' => $request->course_name,
                'place' => $request->place,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,
            ]);
            $employee->courses()->save($course);
        }

        if ($request->work_place) {
            $experience = new Experince([
                'work_place' => $request->work_place,
                'job_title' => $request->job_title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'salary' => $request->salary,
                'description' => $request->description,
            ]);
            $employee->experiences()->save($experience);
        }

        if ($request->family_name) {
            $family = new Family([

                'family_name' => $request->family_name,
                'id_number' => $request->id_number,
                'relative_relation' => $request->relative_relation,
                'birthdate' => $request->birthdate,
                'is_study' => $request->is_study,
                'is_work' => $request->is_work,
                'status_id' => $request->status_id,
            ]);
            $employee->families()->save($family);
        }


        return redirect()->route('all_employees')->with([
            'message' => 'employee created successfully',
            'alert-type' => 'success',
        ]);
    }

    public function edit($employee_id)
    {
        $employee = Employee::find($employee_id);
        $genders = Gender::all()->pluck('name', 'id');
        $statuses = Status::all()->pluck('status', 'id');

        //dd($employee);

        return view('frontend.edit', compact('employee', 'genders', 'statuses'));
    }

    public function update(Request $request, $employee_id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'job_number' => 'required',
            'major' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'hire_date' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'gender_id' => 'required',
            'status_id' => 'required',
            'photo' => 'required',

        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $file_extension = $request->photo->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'images/employees';
        $request->photo->move($path, $file_name);

        $employee = Employee::find($employee_id);
        if ($employee) {
            $data['name'] = $request->name;
            $data['job_number'] = $request->job_number;
            $data['major'] = $request->major;
            $data['mobile'] = $request->mobile;
            $data['email'] = $request->email;
            $data['hire_date'] = $request->hire_date;
            $data['birthdate'] = $request->birthdate;
            $data['address'] = $request->address;
            $data['gender_id'] = $request->gender_id;
            $data['status_id'] = $request->status_id;
            $data['photo'] = $file_name;

            $employee->update($data);


            $university = University::where($request->university_id)->update([
                'qualification' => $request->qualification,
                'major' => $request->major,
                'university_name' => $request->university_name,
                'specialization_history' => $request->specialization_history
            ]);


            $course = Course::where($request->course_id)->update([
                'course_name' => $request->course_name,
                'place' => $request->place,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,
            ]);


            $experience = Experince::where($request->experience_id)->update([
                'work_place' => $request->work_place,
                'job_title' => $request->job_title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'salary' => $request->salary,
                'description' => $request->description,
            ]);

            $family = Family::where($request->family_id)->update([

                'family_name' => $request->family_name,
                'id_number' => $request->id_number,
                'relative_relation' => $request->relative_relation,
                'birthdate' => $request->birthdate,
                'is_study' => $request->is_study,
                'is_work' => $request->is_work,
                'status_id' => $request->status_id,
            ]);


            return redirect()->route('all_employees')->with([
                'message' => 'employee Updated successfully',
                'alert-type' => 'success',
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Something was wrong',
                'alert-type' => 'danger',
            ]);
        }
    }


    public function destroy($employee_id)
    {
        $employee = Employee::find($employee_id)->delete();

        if ($employee) {
            return redirect()->back()->with([
                'message' => 'Employee deleted successfully',
                'alert-type' => 'success',
            ]);

        } else {
            return redirect()->back()->with([
                'message' => 'Something Was Wrong',
                'alert-type' => 'danger',
            ]);
        }
    }
}
