<?php

namespace App\Http\Controllers\Branch\Student;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Course;
use App\Models\Qualification;
use App\Models\Receipt;
use App\Models\ReceiptItem;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    public function index()
    {
        $courses = Course::whereStatus(1)->orderBy('created_at', 'DESC')->get();
        return view('branch.student.index', compact('courses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'regd_no' => 'required',
            'name' => 'required|string',
            'father_name' =>  'required|string',
            'email' =>  'email|unique:students,email',
            'mobile' => 'required|numeric|digits:10|unique:students,mobile',
            'dob' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'course' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:250',
            'sign' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:250',
            'city' =>  'required|string',
            'state' =>  'required|string',
            'pin' =>  'required|numeric',
            'exam_passed' => 'array',
            'exam_passed.*' => 'required',
        ]);

        if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $destination = base_path() . '/public/branch/student/';
            $extension = $photo->getClientOriginalExtension();
            $photo_name = md5(date('now') . time()) . "." . $extension;
            $original_path = $destination . $photo_name;
            Image::make($photo)->save($original_path);
            $thumb_path = base_path() . '/public/branch/student/thumb/' . $photo_name;
            Image::make($photo)
                ->resize(346, 252)
                ->save($thumb_path);
        }

        if ($request->hasfile('sign')) {
            $image = $request->file('sign');
            $destination = base_path() . '/public/branch/student/';
            $image_extension = $image->getClientOriginalExtension();
            $image_name = md5(date('now') . time()) . "." . $image_extension;
            $original_path = $destination . $image_name;
            Image::make($image)->save($original_path);
            $thumb_path = base_path() . '/public/branch/student/thumb/' . $image_name;
            Image::make($image)
                ->resize(346, 252)
                ->save($thumb_path);
        }

        try {
            DB::transaction(function () use ($request, $photo_name, $image_name) {
                $student = new Student();
                $student->registraion_no = $request->input('regd_no');
                $student->name = $request->input('name');
                $student->father_name = $request->input('father_name');
                $student->dob = $request->input('dob');
                $student->gender = $request->input('gender');
                $student->email = $request->input('email');
                $student->mobile = $request->input('mobile');
                $student->category = $request->input('category');
                $student->course = $request->input('course');
                $student->start_date = $request->input('start_date');
                $student->end_date = $request->input('end_date');
                $student->photo = $photo_name;
                $student->sign = $image_name;
                $student->branch_id = Auth::guard('branch')->user()->id;
                $student->start_date = $request->input('start_date');
                $student->end_date = $request->input('end_date');
                $student->save();

                // Present Address
                $address1 = new Address();
                $address1->student_id = $student->id;
                $address1->state = $request->input('state');
                $address1->city = $request->input('city');
                $address1->pin = $request->input('pin');
                $address1->address = $request->input('present_address');
                $address1->type = 1;
                $address1->save();

                // Permenat Address
                $address2 = new Address();
                $address2->student_id = $student->id;
                $address2->state = $request->input('p_state');
                $address2->city = $request->input('p_city');
                $address2->pin = $request->input('p_pin');
                $address2->address = $request->input('permanent_address');
                $address2->type = 2;
                $address2->save();

                $student->present_address_id = $address1->id;
                $student->permanent_address_id = $address2->id;
                // $registraion_no = $this->generateRegistrationNo($student->id);
                // $student->registraion_no = $registraion_no;
                $student->save();

                $data = [];
                for ($i = 0; $i < count($request->exam_passed); $i++) {
                    $data[] = [
                        'student_id' => $student->id,
                        'exam_passed' => $request->input('exam_passed')[$i],
                        'year_of_pass' => $request->input('year_of_pass')[$i],
                        'board' => $request->input('board')[$i],
                        'marks' => $request->input('marks')[$i],
                        'created_at' => Carbon::now(),
                    ];
                }
                Qualification::insert($data);
            });
            return redirect()->back()->with('message', 'Student is Successfully added!');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function show()
    {
        return view('branch.student.show');
    }
    public function list()
    {
        $query = Student::where('branch_id', Auth::guard('branch')->user()->id)->latest();
        return datatables()->of($query->get())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '
               <a href="' . route('branch.student.view', [encrypt($row->id)]) . '" class="btn btn-primary btn-sm" target="_blank">View</a>
               <a href="' . route('branch.student.receipt', $row) . '" class="btn btn-default btn-sm" target="_blank">Money Receipt</a>
               <a href="' . route('branch.student.view.reciepts', $row) . '" class="btn btn-primary btn-sm" target="_blank">View Receipts</a>
               <a href="' . route('branch.student.edit', [encrypt($row->id)]) . '" class="btn btn-info btn-sm" target="_blank">Edit</a>              
               <a href="' . route('branch.student.delete', [encrypt($row->id)]) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are You Want To Delete\')">Delete</a>              
               ';
                if ($row->status == '1') {
                    $btn .= '<a href="' . route('branch.student.status', ['id' => encrypt($row->id), 'status' => 2]) . '" class="btn btn-warning btn-sm">Disable</a>';
                    return $btn;
                } else {
                    $btn .= '<a href="' . route('branch.student.status', ['id' => encrypt($row->id), 'status' => 1]) . '" class="btn btn-success btn-sm">Enable</a>';
                    return $btn;
                }
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function view($id)
    {
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $student = Student::findOrFail($id);
        $course = $student->courses->name;
        $data = "Registration No: $student->registraion_no\nName : $student->name\nFather: $student->father_name\nCourse : $course\nMobile: $student->mobile";
        $qr_code = QrCode::generate($data);
        return view('branch.student.view', compact('student', 'qr_code'));
    }

    public function edit($id)
    {
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $student = Student::find($id);
        $courses = Course::whereStatus(1)->orderBy('created_at', 'DESC')->get();
        return view('branch.student.edit', compact('student', 'courses'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'regd_no' => 'required',
            'name' => 'required|string',
            'father_name' =>  'required|string',
            'email' =>  'email|unique:branches,email,' . $id,
            'mobile' => 'required|numeric|min:10|unique:branches,mobile,' . $id,
            'dob' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'course' => 'required',
            'city' =>  'required|string',
            'state' =>  'required|string',
            'pin' =>  'required|numeric',
            'exam_passed.*' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        if ($request->hasfile('photo')) {
            $this->validate($request, [
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $photo = $request->file('photo');
            $destination = base_path() . '/public/branch/student/';
            $extension = $photo->getClientOriginalExtension();
            $photo_name = md5(date('now') . time()) . "." . $extension;
            $original_path = $destination . $photo_name;
            Image::make($photo)->save($original_path);
            $thumb_path = base_path() . '/public/branch/student/thumb/' . $photo_name;
            Image::make($photo)
                ->resize(346, 252)
                ->save($thumb_path);

            // Check wheather image is in DB
            $checkImage = Student::find($id);
            if ($checkImage->photo) {
                //Delete
                $image_path_thumb = "/public/branch/student/thumb/" . $checkImage->photo;
                $image_path_original = "/public/branch/student/" . $checkImage->photo;
                if (File::exists($image_path_thumb)) {
                    File::delete($image_path_thumb);
                }
                if (File::exists($image_path_original)) {
                    File::delete($image_path_original);
                }

                $checkImage->photo = $photo_name;
                $checkImage->save();
            } else {
                $checkImage->photo = $photo_name;
                $checkImage->save();
            }
        }
        if ($request->hasfile('sign')) {
            $this->validate($request, [
                'sign' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $sign = $request->file('sign');
            $destination = base_path() . '/public/branch/student/';
            $extension = $sign->getClientOriginalExtension();
            $sign_name = md5(date('now') . time()) . "." . $extension;
            $original_path = $destination . $sign_name;
            Image::make($sign)->save($original_path);
            $thumb_path = base_path() . '/public/branch/student/thumb/' . $sign_name;
            Image::make($sign)
                ->resize(346, 252)
                ->save($thumb_path);

            // Check wheather image is in DB
            $checkSign = Student::find($id);
            if ($checkSign->sign) {
                //Delete
                $image_path_thumb = "/public/branch/student/thumb/" . $checkSign->sign;
                $image_path_original = "/public/branch/student/" . $checkSign->sign;
                if (File::exists($image_path_thumb)) {
                    File::delete($image_path_thumb);
                }
                if (File::exists($image_path_original)) {
                    File::delete($image_path_original);
                }

                //Update
                $checkSign->sign = $sign_name;
                $checkSign->save();
            } else {
                $checkSign->sign = $sign_name;
                $checkSign->save();
            }
        }
        try {
            DB::transaction(function () use ($request, $id) {
                $student = Student::find($id);
                $student->registraion_no = $request->input('regd_no');
                $student->name = $request->input('name');
                $student->father_name = $request->input('father_name');
                $student->dob = $request->input('dob');
                $student->gender = $request->input('gender');
                $student->email = $request->input('email');
                $student->mobile = $request->input('mobile');
                $student->category = $request->input('category');
                $student->course = $request->input('course');
                $student->branch_id = Auth::guard('branch')->user()->id;
                $student->start_date = $request->input('start_date');
                $student->end_date = $request->input('end_date');
                $student->save();

                // Present Address
                $address1 = $student->present_address_id == null ? new Address() : Address::find($student->present_address_id);
                $address1->state = $request->input('state');
                $address1->city = $request->input('city');
                $address1->pin = $request->input('pin');
                $address1->address = $request->input('present_address');
                $address1->type = 1;
                $address1->save();

                // Permanent Address
                $address2 = $student->permanent_address_id == null ? new Address() : Address::find($student->permanent_address_id);
                $address2->state = $request->input('p_state');
                $address2->city = $request->input('p_city');
                $address2->pin = $request->input('p_pin');
                $address2->address = $request->input('permanent_address');
                $address2->type = 2;
                $address2->save();

                $data = [];
                for ($i = 0; $i < count($request->qualification_id); $i++) {
                    $data = [
                        'exam_passed' => $request->input('exam_passed')[$i],
                        'year_of_pass' => $request->input('year_of_pass')[$i],
                        'board' => $request->input('board')[$i],
                        'marks' => $request->input('marks')[$i],
                        'updated_at' => Carbon::now(),
                    ];
                    $update = Qualification::where('id', $request->qualification_id[$i])->first();
                    $update->update($data);
                }
            });
            return redirect()->back()->with('message', 'Student is Successfully updated!');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function destroy($id)
    {
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $student = Student::find($id);
        $photo = $student->photo;
        $sign = $student->sign;
        if ($student->delete()) {
            File::exists('branch/student/thumb/' . $photo) ? File::delete('branch/student/thumb/' . $photo) : null;
            File::exists('branch/student/' . $photo) ? File::delete('branch/student/' . $photo) : null;

            File::exists('branch/student/thumb/' . $sign) ? File::delete('branch/student/thumb/' . $sign) : null;
            File::exists('branch/student/' . $sign) ? File::delete('branch/student/' . $sign) : null;

            return redirect()->back()->with('message', 'Student Deleted Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function status($id, $status)
    {
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $student = Student::find($id);
        $student->status = $status;
        if ($student->save()) {
            return redirect()->back()->with('message', 'Student Successfully Updated!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function getReceiptForm($id)
    {
        $student = Student::findOrFail($id);
        return view('branch.student.receiptform', compact('student'));
    }
    public function postReceiptDatas(Request $request)
    {
        $this->validate($request, [
            'discount'  =>  'required|numeric|min:0',
            'products.*.name'   =>  'required|max:255',
            'products.*.price'  => 'required|numeric|min:1',
            'products.*.qty'    =>  'required|integer|min:1'
        ]);

        $products = collect($request->products)->transform(function ($product) {
            $product['total'] = $product['qty'] * $product['price'];
            return new ReceiptItem($product);
        });

        if ($products->isEmpty()) {
            return response()
                ->json([
                    'products_empty'    =>  ['One or more products is required.']
                ], 422);
        }

        $data = $request->except('products');
        $data['sub_total'] = $products->sum('total');
        $data['grand_total'] = $data['sub_total'] - $data['discount'];
        $data['branch_id'] = Auth::guard('branch')->user()->id;
        $data['invoice_date'] = Carbon::now()->toDateString();
        $receipt = Receipt::create($data);
        $receipt->money_receipt_no = $this->createMoneyReceiptNo($receipt->id);
        $receipt->save();
        $receipt->receiptItem()->saveMany($products);

        return response()->json(['created'   =>  true, 'id'    =>  $receipt->id]);
    }
    public function getReceipt($id)
    {
        $receipt = Receipt::with('receiptItem')->findOrFail($id);
        return view('branch.student.receipt', compact('receipt'));
    }
    public function getAllReceipt($id)
    {
        $receipts = Receipt::where('student_id', $id)->paginate(10);
        return view('branch.student.viewreceipt', compact('receipts'));
    }
    public function searchReceipt(Request $request)
    {   
        if ($request->has('searchKey')) {
            $search_key = $request->input('searchKey');
            $receipts = Receipt::where('money_receipt_no', 'like', '%' . $search_key . '%')->orderBy('id', 'desc')->paginate(10);
        } else {
            $receipts = Receipt::orderBy('id', 'desc')->paginate(10);
        }
        return view('branch.student.viewreceipt', compact('receipts'));
    }
    private function generateRegistrationNo($id)
    {

        $id = str_pad($id, 5, '0', STR_PAD_LEFT);
        $year = Carbon::now()->year;
        $month = Carbon::now()->format('M');
        $id = 'STU' . '/' . $year . '/' . strtoupper($month) . '/' . $id;
        return $id;
    }

    private function createMoneyReceiptNo($id)
    {
        $id = str_pad($id, 5, '0', STR_PAD_LEFT);
        return $id;
    }
}
