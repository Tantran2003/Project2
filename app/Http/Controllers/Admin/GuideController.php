<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Guide;
use Illuminate\Support\Carbon as SupportCarbon;


class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guides = Guide::latest()->paginate(8);
        $guideCount = Guide::all()->count();
        return response()->view('admin.guide.index', compact('guides', 'guideCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return response()->view('admin.guide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'nid' => 'required|unique:guides|numeric',
            'email' => 'required|unique:guides|email',
            'contact' => 'required|unique:guides|numeric',
            'address' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);

        $guide = new Guide();
        $guide->name = $request->name;
        $guide->nid = $request->nid;
        $guide->email = $request->email;
        $guide->contact = $request->contact;
        $guide->address = $request->address;

        // Make Unique Name for Image 
        $currentDate = now();
        $guide->created_at = $currentDate;
        $guide->updated_at = $currentDate;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameimage = time() . '_' . $image->getClientOriginalName();
            $image->move('public/file/img/img_guide/', $nameimage);
            $guide->image = $nameimage;
        }

        $guide->save();

        toastr()->success('Thêm thành công!');
        return redirect()->route("ht.guideindex");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {

        return response()->view('admin.guide.show', compact('guide'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
{
    return response()->view('admin.guide.edit',compact('guide'));
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guide = Guide::find($id);

    if (!$guide) {
        // Handle the case where the guide with the given ID is not found
        toastr()->error('Guide not found.');
        return redirect()->route('ht.guideindex');
    }

    $this->validate($request, [
        'name' => 'required',
        'nid' => 'required|numeric|unique:guides,nid,' . $guide->id,
        'email' => 'required|email|unique:guides,email,' . $guide->id,
        'contact' => 'required|numeric|unique:guides,contact,' . $guide->id,
        'address' => 'required',
        'image' => 'nullable|mimes:jpeg,png,jpg|image',
    ]);
    $guide->name = $request->name;
    $guide->nid = $request->nid;
    $guide->email = $request->email;
    $guide->contact = $request->contact;
    $guide->address = $request->address;
        // Get Form Image
        if ($request->hasFile("image")) {
            $img = $request->file("image");
            $nameimage = time() . "_" . $img->getClientOriginalName();
    
            // Delete the old image
            @unlink('public/file/img/img_guide/' . $guide->image);
    
            // Move the new image to the public directory
            $img->move('public/file/img/img_guide/', $nameimage);
    
            // Update the image property
            $guide->image = $nameimage;
        }
        $guide->save();
        toastr()->success('Guide updated successfully!');
        return redirect()->route('ht.guideindex');
        
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {

            $delete = Guide::find($id);

            @unlink('public/file/img/img_guide/' . $delete->image);
            if ($delete->images != "") {
                // Giải mã JSON để có danh sách tên file hình ảnh
                $images = json_decode($delete->images);

                // Xóa hình ảnh
                foreach ($images as $key) {
                    @unlink('public/file/img/img_guide/' . $key);
                }
            }
            Guide::destroy($id);

            toastr()->success('Xóa thành công !');
            return response()->redirect(route('admin.guide.index'))->with('success', 'Guide deleted Successfully');
        } catch (\Throwable $th) {
            return response()->redirect(route('admin.guide.index'))->with('success', 'Guide deleted Successfully');
        }
    }

}