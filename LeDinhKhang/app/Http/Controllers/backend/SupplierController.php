<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Link;
use App\Models\Menu;
use App\Models\Topic;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Illuminate\Support\Str;

class SupplierController extends Controller
{
    /* GET:admin/supplier 
    */
    public function index()
    {
        $list=Supplier::where('status','!=',0  )->orderBy('created_at','desc')->get();
        return view('backend.supplier.index',compact('list'));
    }

    /* GET:admin/supplier/create
     */
    public function create()
    {
        return view('backend.supplier.create');
    }

   

    /* POST:admin/supplier/store
     */
    public function store(StoreSupplierRequest $request)
    {
        $supplier=new Supplier();
        $supplier->name=$request->name;
        $slug =Str::slug($request->name,'-');
        $supplier->slug= $slug;
        $supplier->metadesc=$request->metadesc;
        $supplier->metakey=$request->metakey;

        $supplier->siteurl=$request->siteurl;
        $supplier->fullname=$request->fullname;
        $supplier->phone=$request->phone;
        $supplier->email=$request->email;
        $supplier->address=$request->address;

        $supplier->status=$request->status;
        $supplier->created_by=1;
        //upload file
        if ($request->hasFile('logo')){
            $path_dir="images/supplier/";
            $file= $request->file('logo');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath=$file->move($path_dir,$fileName);
            $supplier->logo=$fileName;
            if ($supplier->save())
            { 
                $link= new Link();
                $link->slug = $slug;
                $link->tableid=$supplier->id;
                $link->type='supplier';
                $link->save();
            }
            
            return redirect()->route('supplier.index')->with('message',['typemsg'=>'success','msg'=>'Th??m th??nh c??ng']);
    

        }
        else
        {
            return redirect()->route('supplier.index')->with('message',['typemsg'=>'danger','msg'=>'Ch??a ch???n h??nh']);

        }

    }

   
    /* GET:admin/supplier/1 
    */
    public function show($id)
    {
        $supplier=Supplier::find($id);
        return view('backend.supplier.show',compact('supplier'));

    } 

    /* GET:admin/supplier/1/edit 
    */
    public function edit($id)
    {
        $supplier=Supplier::find($id);
        return view('backend.supplier.edit',compact('supplier'));
    }

    /* PUT:admin/supplier 
    */
    public function update(UpdateSupplierRequest $request, $id)
    {
        $supplier=Supplier::find($id);
        $supplier->name=$request->name;
        $slug =Str::slug($request->name,'-');
        $supplier->slug= $slug;
        $supplier->metadesc=$request->metadesc;
        $supplier->metakey=$request->metakey;
        $supplier->siteurl=$request->siteurl;
        $supplier->fullname=$request->fullname;
        $supplier->phone=$request->phone;
        $supplier->email=$request->email;
        $supplier->address=$request->address;
        $supplier->status=$request->status;
        $supplier->updated_by=1;
        //upload file
        if ($request->hasFile('logo')){
            $path_dir="images/supplier/";
            $file= $request->file('logo');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath=$file->move($path_dir,$fileName);
            $supplier->logo=$fileName;
       }
       if ($supplier->save())
            { 
                $link= Link::where([['tableid','=',$id],['type','=','supplier']])->first();
            if($link!=null)
            {
                $link->slug=$slug;
                $link->save();
            }
            $list_menu= Menu::where([['tableid','=',$id],['type','=','supplier']])->get();
            if(count($list_menu)>0)
            {
                foreach($list_menu as $menu)
                {
                    $menu->name=$supplier->name;
                    $menu->link=$slug;
                    $menu->save();
                }
            }
            }
           
            return redirect()->route('supplier.index')->with('message',['typemsg'=>'success','msg'=>'Th??m th??nh c??ng']);
            

    }

    
    /* DELETE:admin/supplier 
    */
    public function destroy($id)
    {
        $supplier=Supplier::find($id);
        if($supplier==null)
        {
            return redirect()->route('supplier-trash')->with('message',['typemsg'=>'danger','msg'=>'M???u tin kh??ng t???n t???i']);
        }
        $supplier->delete();
        return redirect()->route('supplier-trash')->with('message',['typemsg'=>'success','msg'=>'X??a th??nh c??ng']);

    }


    /* GET:admin/supplier-trash 
    */
    public function trash()
    {
        $list=Supplier::where('status','==',0  )->orderBy('created_at','desc')->get();
        return view('backend.supplier.trash',compact('list'));
    }

    
    /* GET:admin/supplier/1/status 
    */
    public function status($id)
    {
        //
        $supplier= Supplier::find($id);
        if($supplier==null)
        {
            return redirect()->route('supplier.index')->with('message',['typemsg'=>'danger','msg'=>'M???u tin kh??ng t???n t???i']);
        }
        $supplier->status=($supplier->status==2)?1:2;
        $supplier->save();
        return redirect()->route('supplier.index')->with('message',['typemsg'=>'success','msg'=>'Thay ?????i tr???ng th??i th??nh c??ng']);

    }
    /* GET:admin/supplier/1/deltrash 
    */
    public function deltrash($id)
    {
        $supplier= Supplier::find($id);
        if($supplier==null)
        {
            return redirect()->route('supplier.index')->with('message',['typemsg'=>'success','msg'=>'M???u tin kh??ng t???n t???i']);
        }
        $supplier->status=0;
        $supplier->save();
        return redirect()->route('supplier.index')->with('message',['typemsg'=>'success','msg'=>'X??a th??nh c??ng']);
    }

    /* GET:admin/supplier/1/retrash 
    */
    public function retrash($id)
    {
        $supplier= Supplier::find($id);
        if($supplier==null)
        {
            return redirect()->route('supplier-trash')->with('message',['typemsg'=>'success','msg'=>'M???u tin kh??ng t???n t???i']);
        }
        $supplier->status=2;
        $supplier->save();
        return redirect()->route('supplier-trash')->with('message',['typemsg'=>'success','msg'=>'Kh??i ph???c th??nh c??ng']);
    }
}
