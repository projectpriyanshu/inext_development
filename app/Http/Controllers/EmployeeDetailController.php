<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\EmployeeDetail;
use App\Models\City;
use Illuminate\Support\Facades\Storage;
use App\Exports\ExportData;
use Excel;

class EmployeeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        
            if(!empty($search))
            {    
                $check_data = EmployeeDetail::select('employee_details.*','cities.code as city_code','cities.name as city_name',
                'states.name as state_name','states.code as state_code')
                ->join('cities','cities.id','employee_details.city_id')
                ->join('states','states.id','cities.state_id')
                ->orWhere(array('employee_details.employee_id'=>$search))->orWhere('employee_details.aadhar_no','like','%'.$search.'%')->orWhere(array('email'=>$search))->first();
            
            $return = array();
            if(!empty($check_data))
            {
                $return['id'] = $check_data->id;
                $return['employee_id'] = $check_data->employee_id;
                $return['father_name'] = $check_data->father_name;
                $return['mother_name'] = $check_data->mother_name;
                $return['address'] = $check_data->address;
                $return['city_code'] = $check_data->city_code;
                $return['city_name'] = $check_data->city_name;
                $return['state_code'] = $check_data->state_code;
                $return['state_name'] = $check_data->state_name;
                $return['branch_id'] = $check_data->branch_id;
                $return['pincode'] = $check_data->pincode;
                $return['telephone'] = $check_data->telephone;
                $return['email'] = $check_data->email;
                $return['voter_id'] = $check_data->voter_id;
                $return['aadhar_no'] = $check_data->aadhar_no;
                $return['pan_no'] = $check_data->pan_no;
                $return['bank_name'] = $check_data->bank_name;
                $return['account_no'] = $check_data->account_no;
                $return['ifsc_code'] = $check_data->ifsc_code;
                $return['bank_address'] = $check_data->bank_address;
                $return['dob'] = $check_data->dob;
                $return['doj'] = $check_data->doj;
                $return['department'] = $check_data->department;
                $return['material'] = $check_data->material;
                $return['gender'] = $check_data->gender;
                $return['education'] = $check_data->education;
                $return['payment'] = $check_data->payment;
                $return['uan_no'] = $check_data->uan_no;
                $return['annual_salary'] = $check_data->annual_salary;
                $return['photo_path'] = $check_data->photo_path;
                $return['status'] = '200';
                $return['message'] = 'Employee Details Found!';
                
            }
            
            else
            {
                $return['id'] = '';
                $return['employee_id'] = '';
                $return['father_name'] = '';
                $return['mother_name'] = '';
                $return['address'] = '';
                $return['city_id'] = '';
                $return['state_id'] = '';
                $return['branch_id'] = '';
                $return['pincode'] = '';
                $return['telephone'] = '';
                $return['email'] = '';
                $return['voter_id'] = '';
                $return['aadhar_no'] = '';
                $return['pan_no'] = '';
                $return['bank_name'] = '';
                $return['account_no'] = '';
                $return['ifsc_code'] = '';
                $return['bank_address'] = '';
                $return['dob'] = '';
                $return['doj'] = '';
                $return['department'] = '';
                $return['material'] = '';
                $return['gender'] = '';
                $return['education'] = '';
                $return['payment'] = '';
                $return['uan_no'] = '';
                $return['annual_salary'] = '';
                $return['photo_path'] = '';
                $return['status'] = '400';
                $return['message'] = 'Employee Details does not exist!';
            }
            return json_encode($return);
        }
        return view('admin.employee-details.index');
    }

    public function list()
    {
        $employee = cache('employee', function () {
            return EmployeeDetail::orderBy('id','DESC')->paginate(10);
        });
        return view('admin.employee-details.list',[
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employeeDetail = $request->all();
     
        $city = City::select('id','state_id')->where('name',$request->city_id)->first();
        if (!$city) {
            return back()->with('error', 'Please Select City from the List')->withInput();
        }
            if (!empty($request->id)) {
                $rules = [
                'employee_id'     => 'required|unique:employee_details,employee_id,'.$request->id,
                'father_name'     => 'required',
                'mother_name'     => 'required',
                'address'         => 'required',
                'city_id'         => 'required',
                'branch_id'       => 'required',
                'pincode'         => 'required|numeric',
                'telephone'       => 'required|numeric',
                'email'           => 'required|unique:employee_details,email,'.$request->id,
                'voter_id'        => 'required|unique:employee_details,voter_id,'.$request->id,
                'aadhar_no'       => 'required|unique:employee_details,aadhar_no,'.$request->id,
                'pan_no'          => 'required|unique:employee_details,pan_no,'.$request->id,
                'bank_name'       => 'required',
                'account_no'      => 'required|unique:employee_details,account_no,'.$request->id,
                'ifsc_code'       => 'required',
                'bank_address'    => 'required',
                'dob'             => 'required',
                'doj'             => 'required',
                'department'      => 'required',
                'material'        => 'required',
                'gender'          => 'required',
                'education'       => 'required',
                'payment'         => 'required',
                'uan_no'          => 'required|unique:employee_details,uan_no,'.$request->id,
                'annual_salary'   => 'required',
                'photo_path'      => 'nullable|image|mimes:jpeg,png,jpg,'.$request->id,
            ];
            
                $validation = Validator::make($employeeDetail, $rules);
           
                if ($validation->fails()) {
                    $messages = $validation->errors();
                    return redirect()->route('employee-details-index')->withErrors($messages)->withInput();
                }
           
                $employeeDetail = EmployeeDetail::find($request->id);
                $employeeDetail->employee_id = $request->employee_id;
                $employeeDetail->father_name = $request->father_name;
                $employeeDetail->mother_name = $request->mother_name;
                $employeeDetail->address = $request->address;
                $employeeDetail->city_id = $city->id;
                $employeeDetail->state_id = $city->state_id;
                $employeeDetail->branch_id = $request->branch_id;
                $employeeDetail->pincode = $request->pincode;
                $employeeDetail->telephone = $request->telephone;
                $employeeDetail->email = $request->email;
                $employeeDetail->voter_id = $request->voter_id;
                $employeeDetail->aadhar_no = $request->aadhar_no;
                $employeeDetail->pan_no = $request->pan_no;
                $employeeDetail->bank_name = $request->bank_name;
                $employeeDetail->account_no = $request->account_no;
                $employeeDetail->ifsc_code = $request->ifsc_code;
                $employeeDetail->bank_address = $request->bank_address;
                $employeeDetail->dob = $request->dob;
                $employeeDetail->doj = $request->doj;
                $employeeDetail->department = $request->department;
                $employeeDetail->material = $request->material;
                $employeeDetail->gender = $request->gender;
                $employeeDetail->education = $request->education;
                $employeeDetail->payment = $request->payment;
                $employeeDetail->uan_no = $request->uan_no;
                $employeeDetail->annual_salary = $request->annual_salary;
                if ($request->hasFile('photo_path') && $request->photo_path != '') {
                    $employeeDetail = EmployeeDetail::where('id', $request->id)->first();
               
                    $destinationPath = public_path('/uploads/employee_image/');
                    if (Storage::exists($destinationPath)) {
                        unlink($destinationPath); //delete from storage
                    }
                    $image = $request->file('photo_path');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/uploads/employee_image/');
                    $image->move($destinationPath, $name);
    
                    $employeeDetail->update([
                    'photo_path' => $name,
                ]);
                }
                $employeeDetail->save();
            } else {
                $rules = [
                'employee_id'     => 'required|unique:employee_details,employee_id',
                'father_name'     => 'required',
                'mother_name'     => 'required',
                'address'         => 'required',
                'city_id'         => 'required',
                'branch_id'       => 'required',
                'pincode'         => 'required|numeric',
                'telephone'       => 'required|numeric',
                'email'           => 'required|unique:employee_details,email',
                'voter_id'        => 'required|unique:employee_details,voter_id',
                'aadhar_no'       => 'required|unique:employee_details,aadhar_no',
                'pan_no'          => 'required|unique:employee_details,pan_no',
                'bank_name'       => 'required',
                'account_no'      => 'required|unique:employee_details,account_no',
                'ifsc_code'       => 'required',
                'bank_address'    => 'required',
                'dob'             => 'required',
                'doj'             => 'required',
                'department'      => 'required',
                'material'        => 'required',
                'gender'          => 'required',
                'education'       => 'required',
                'payment'         => 'required',
                'uan_no'          => 'required|unique:employee_details,uan_no',
                'annual_salary'   => 'required',
                'photo_path'      => 'required',
            ];
                $validation = Validator::make($employeeDetail, $rules);
            
                if ($validation->fails()) {
                    $messages = $validation->errors();
                    return redirect()->route('employee-details-index')->withErrors($messages)->withInput()->with('error', 'All fields are required!');
                }
         
                $employeeDetail = new EmployeeDetail();
                $employeeDetail->employee_id = $request->employee_id;
                $employeeDetail->father_name = $request->father_name;
                $employeeDetail->mother_name = $request->mother_name;
                $employeeDetail->address = $request->address;
                $employeeDetail->city_id = $city->id;
                $employeeDetail->state_id = $city->state_id;
                $employeeDetail->branch_id = $request->branch_id;
                $employeeDetail->pincode = $request->pincode;
                $employeeDetail->telephone = $request->telephone;
                $employeeDetail->email = $request->email;
                $employeeDetail->voter_id = $request->voter_id;
                $employeeDetail->aadhar_no = $request->aadhar_no;
                $employeeDetail->pan_no = $request->pan_no;
                $employeeDetail->bank_name = $request->bank_name;
                $employeeDetail->account_no = $request->account_no;
                $employeeDetail->ifsc_code = $request->ifsc_code;
                $employeeDetail->bank_address = $request->bank_address;
                $employeeDetail->dob = $request->dob;
                $employeeDetail->doj = $request->doj;
                $employeeDetail->department = $request->department;
                $employeeDetail->material = $request->material;
                $employeeDetail->gender = $request->gender;
                $employeeDetail->education = $request->education;
                $employeeDetail->payment = $request->payment;
                $employeeDetail->uan_no = $request->uan_no;
                $employeeDetail->annual_salary = $request->annual_salary;
            
                if ($request->hasFile('photo_path')) {
                    $image = $request->file('photo_path');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/uploads/employee_image/');
                    $image->move($destinationPath, $name);
                }
                $employeeDetail->photo_path = $name;
                $employeeDetail->save();
            }
        
       
        return redirect()->route('employee-details-index')->with('success','Employee Details added successfully!');
    }

    /**
     * Export Excel
     */
    public function export(){
        $headArr[] = array('Father Name','Mother Name','Address','City','Pincode','Telephone','Email','Voter Id','Aadhar No','Pan No','Bank Name','Account No','IFSC','Bank Address','DOB','DOJ','Department','Material','Gender','Education','Payment','UAN No','Annual Salary','Added Date','Updated Date');
        $data = EmployeeDetail::select('employee_details.*','cities.name as city_name','states.name as state_name')->join('cities','cities.id','employee_details.city_id')
        ->join('states','states.id','employee_details.state_id')
        ->orderBy('id','ASC')
        ->get();
        $dataArr[] = array();
        foreach($data as $dataRow){
            $dataArr[] = array($dataRow->father_name,$dataRow->mother_name,$dataRow->address,$dataRow->city_name,$dataRow->state_name,$dataRow->pincode,$dataRow->telephone,$dataRow->email,$dataRow->voter_id,$dataRow->aadhar_no,$dataRow->pan_no,$dataRow->bank_name,$dataRow->account_no,$dataRow->ifsc_code,$dataRow->bank_address,$dataRow->dob,$dataRow->doj,$dataRow->department,$dataRow->material,$dataRow->gender,$dataRow->education,$dataRow->payment,$dataRow->uan_no,$dataRow->annual_salary,$dataRow->created_at,$dataRow->updated_at);
        }

        $export = new ExportData($headArr,$dataArr);
        return Excel::download($export, 'export_data.xlsx');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
    public function employeeList(){
        return view('admin.employee-details.employee-list');
    }
}
