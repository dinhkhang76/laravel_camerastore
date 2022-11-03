<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /* GET:admin/slider 
    */
    public function index()
    {
        $list=Slider::where('status','!=',0  )->orderBy('created_at','desc')->get();
        return view('backend.slider.index',compact('list'));
    }

    /* GET:admin/slider/create
     */
    public function create()
    {
        return view('backend.slider.create');
    }

   

    /* POST:admin/slider/store
     */
    public function store(SliderStoreRequest $request)
    {
        $slider=new Slider();
        $slider->name=$request->name;
        $slug =Str::slug($request->name,'-');
        $slider->url=$request->url;
        $slider->position=$request->position;
        $slider->status=$request->status;
        $slider->created_by=1;
        //upload file
        if ($request->hasFile('img')){
            $path_dir="images/slider/";
            $file= $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath=$file->move($path_dir,$fileName);
            $slider->img=$fileName;
            $slider->save();
            return redirect()->route('slider.index')->with('message',['typemsg'=>'success','msg'=>'Thêm slider thành công']);

        }
        else
        {
            return redirect()->route('slider.index')->with('message',['typemsg'=>'danger','msg'=>'Chưa chọn hình']);

        }

    }

   
    /* GET:admin/slider/1 
    */
    public function show($id)
    {
        $slider=Slider::find($id);
        return view('backend.slider.show',compact('slider'));

    } 

    /* GET:admin/slider/1/edit 
    */
    public function edit($id)
    {
        $slider=Slider::find($id);
        return view('backend.slider.edit',compact('slider'));
    }

    /* PUT:admin/slider 
    */
    public function update(SliderUpdateRequest $request, $id)
    {
        $slider=Slider::find($id);
        $slider->name=$request->name;
        $slug =Str::slug($request->name,'-');
        $slider->url=$request->url;
        $slider->position=$request->position;
        $slider->status=$request->status;
        $slider->updated_by=1;
        //upload file
        if ($request->hasFile('img')){
            $path_dir="images/slider/";
            $file= $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath=$file->move($path_dir,$fileName);
            $slider->img=$fileName;
       }
            $slider->save();
            return redirect()->route('slider.index')->with('message',['typemsg'=>'success','msg'=>'Cập nhật slider thành công']);
    }

    
    /* DELETE:admin/slider 
    */
    public function destroy($id)
    {
        $slider=Slider::find($id);
        if($slider==null)
        {
            return redirect()->route('slider-trash')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $slider->delete();
        return redirect()->route('slider-trash')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);

    }


    /* GET:admin/slider-trash 
    */
    public function trash()
    {
        $list=Slider::where('status','==',0  )->orderBy('created_at','desc')->get();
        return view('backend.slider.trash',compact('list'));
    }

    
    /* GET:admin/slider/1/status 
    */
    public function status($id)
    {
        //
        $slider= Slider::find($id);
        if($slider==null)
        {
            return redirect()->route('slider.index')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $slider->status=($slider->status==2)?1:2;
        $slider->save();
        return redirect()->route('slider.index')->with('message',['typemsg'=>'success','msg'=>'Thay đổi trạng thái thành công']);

    }
    /* GET:admin/slider/1/deltrash 
    */
    public function deltrash($id)
    {
        $slider= Slider::find($id);
        if($slider==null)
        {
            return redirect()->route('slider.index')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $slider->status=0;
        $slider->save();
        return redirect()->route('slider.index')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);
    }

    /* GET:admin/slider/1/retrash 
    */
    public function retrash($id)
    {
        $slider= Slider::find($id);
        if($slider==null)
        {
            return redirect()->route('slider-trash')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $slider->status=2;
        $slider->save();
        return redirect()->route('slider-trash')->with('message',['typemsg'=>'success','msg'=>'Khôi phục thành công']);
    }
}
