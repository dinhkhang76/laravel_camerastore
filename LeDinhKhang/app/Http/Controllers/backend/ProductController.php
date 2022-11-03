<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;

class ProductController extends Controller
{
    /* GET:admin/product 
    */
    public function index()
    {
        $list=Product::where('products.status','!=',0)
        ->join('categorys', 'categorys.id','=','products.catid')
        ->join('suppliers','suppliers.id','=','products.suppid')
        ->orderBy('products.created_at','desc')
        ->select("products.id","products.img","products.name","products.created_at","products.status","categorys.name as catname","suppliers.name as suppname")
        ->get();
        return view('backend.product.index',compact('list'));
    }

    /* GET:admin/product/create
     */
    public function create()
    {
        $list_category=Category::where('status','!=',0)->orderBy('created_at','desc')->get();
        $list_supplier=Supplier::where('status','!=',0)->orderBy('created_at','desc')->get();
        return view('backend.product.create',compact('list_category','list_supplier') );
    }

   

    /* POST:admin/product/store
     */
    public function store(ProductStoreRequest $request)
    {
        $product=new Product();
        $product->name=$request->name;
        $slug =Str::slug($request->name,'-');
        $product->slug= $slug;
        $product->metadesc=$request->metadesc;
        $product->metakey=$request->metakey;
        $product->detail=$request->detail;
        $product->catid=$request->catid;
        $product->suppid=$request->suppid;
        $product->price=$request->price;
        $product->pricesale=$request->pricesale;
        $product->number=$request->number;
        $product->status=$request->status;
        $product->created_by=1;
        //upload file
        if ($request->hasFile('img')){
            $path_dir="images/products/";
            $file= $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath=$file->move($path_dir,$fileName);
            $product->img=$fileName;
            $product->save();
            return redirect()->route('product.index')->with('message',['typemsg'=>'success','msg'=>'Thêm thành công']);
        }
        else
        {
            return redirect()->back()->with('imgerror','Chưa chọn hình ảnh');

        }
        
    }

   
    /* GET:admin/product/1 
    */
    public function show($id)
    {
        $product=Product::find($id);
        return view('backend.product.show',compact('product'));

    } 

    /* GET:admin/product/1/edit 
    */
    public function edit($id)
    {
        $product=Product::find($id);
        $list_category=Category::where('status','!=',0)->orderBy('created_at','desc')->get();
        $list_supplier=Supplier::where('status','!=',0)->orderBy('created_at','desc')->get();
        return view('backend.product.edit',compact('list_category','list_supplier','product') );

    }

    /* PUT:admin/product 
    */
    public function update(ProductUpdateRequest $request, $id)
    {
        $product=Product::find($id);
        $product->name=$request->name;
        $slug =Str::slug($request->name,'-');
        $product->slug= $slug;
        $product->metadesc=$request->metadesc;
        $product->metakey=$request->metakey;
        $product->detail=$request->detail;
        $product->catid=$request->catid;
        $product->suppid=$request->suppid;
        $product->price=$request->price;
        $product->pricesale=$request->pricesale;
        $product->number=$request->number;
        $product->status=$request->status;
        $product->updated_by=1;
        //upload file
        if ($request->hasFile('img')){
            $path_dir="images/products/";
            $file= $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath=$file->move($path_dir,$fileName);
            $product->img=$fileName;
        }
        $product->save();
        return redirect()->route('product.index')->with('message',['typemsg'=>'success','msg'=>'Cập nhật thành công']);

    }

    
    /* DELETE:admin/product 
    */
    public function destroy($id)
    {
        $product=Product::find($id);
        if($product==null)
        {
            return redirect()->route('product-trash')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $product->delete();
        return redirect()->route('product-trash')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);

    }


    /* GET:admin/product-trash 
    */
    public function trash()
    {
        $list=Product::where('products.status','=',0)
        ->join('categorys', 'categorys.id','=','products.catid')
        ->join('suppliers','suppliers.id','=','products.suppid')
        ->orderBy('products.created_at','desc')
        ->select("products.id","products.img","products.name","products.created_at","products.status","categorys.name as catname","suppliers.name as suppname")
        ->get();
         return view('backend.product.trash',compact('list'));
    }

    
    /* GET:admin/product/1/status 
    */
    public function status($id)
    {
        //
        $product= Product::find($id);
        if($product==null)
        {
            return redirect()->route('product.index')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $product->status=($product->status==2)?1:2;
        $product->save();
        return redirect()->route('product.index')->with('message',['typemsg'=>'success','msg'=>'Thay đổi trạng thái thành công']);

    }
    /* GET:admin/product/1/deltrash 
    */
    public function deltrash($id)
    {
        $product= Product::find($id);
        if($product==null)
        {
            return redirect()->route('product.index')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $product->status=0;
        $product->save();
        return redirect()->route('product.index')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);
    }

    /* GET:admin/product/1/retrash 
    */
    public function retrash($id)
    {
        $product= Product::find($id);
        if($product==null)
        {
            return redirect()->route('product-trash')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $product->status=2;
        $product->save();
        return redirect()->route('product-trash')->with('message',['typemsg'=>'success','msg'=>'Khôi phục thành công']);
    }
}
