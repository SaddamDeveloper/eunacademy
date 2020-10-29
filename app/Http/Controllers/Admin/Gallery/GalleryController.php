<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.gallery.index');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $destination = base_path() . '/public/admin/gallery/';
            $extension = $photo->getClientOriginalExtension();
            $photo_name = md5(date('now') . time()) . "." . $extension;
            $original_path = $destination . $photo_name;
            Image::make($photo)->save($original_path);
            $thumb_path = base_path() . '/public/admin/gallery/thumb/' . $photo_name;
            Image::make($photo)
                ->resize(346, 252)
                ->save($thumb_path);
        }

        $gallery = new Gallery();
        $gallery->name = $request->input('name');
        $gallery->photo = $photo_name;

        if ($gallery->save()) {
            return redirect()->back()->with('message', 'Gallery added successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function show(){
        return view('admin.gallery.show');
    }
    public function list(){
        return datatables()->of(Gallery::orderBy('created_at', 'DESC')->get())
        ->addIndexColumn()
        ->addColumn('photo', function($row){
            if($row->photo){
                $photo = '<img src="'.asset("admin/gallery/thumb/".$row->photo).'" width="100"/>';
            }
            return $photo;
        })
        ->addColumn('action', function($row){
            $action = '<a href="'.route('admin.destroy.gallery', ['id' => encrypt($row->id)]).'" class="btn btn-primary"><i class="fa fa-trash"></i></a>';
            if($row->status == '1'){
                $action .= '<a href="'.route('admin.status.gallery', ['id' => encrypt($row->id), 'status'=> 
                2]).'" class="btn btn-danger"><i class="fa fa-power-off"></i></a>';
            }else{
                $action .= '<a href="'.route('admin.status.gallery', ['id' => encrypt($row->id), 'status'=> 
                1]).'" class="btn btn-success"><i class="fa fa-check"></i></a>';
            }
            return $action;
        })
        ->rawColumns(['action', 'photo'])
        ->make(true);
    }

    public function destroy($id){
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $gallery = Gallery::find($id);
        $photo = $gallery->photo;
        if($gallery->delete()){
            $image_path_thumb = "/public/admin/gallery/thumb/".$photo;  
            $image_path_original = "/public/admin/gallery/".$photo;  
            if(File::exists($image_path_thumb)) {
                File::delete($image_path_thumb);
            }
            if(File::exists($image_path_original)){
                File::delete($image_path_original);
            }
            return redirect()->back()->with('message', 'Gallery Deleted successfully');
        }
    }
    public function status($id, $status){
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $gallery = Gallery::find($id);
        $gallery->status = $status;
        if($gallery->save()){
            return redirect()->back()->with('message', 'Gallery Updated Successfully');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
