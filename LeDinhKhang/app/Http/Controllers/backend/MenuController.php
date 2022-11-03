<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Supplier;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Menu::where('status','!=',0)->get();
        $list_category = Category::where('status','!=',0)->get();
        $list_topic = Topic::where('status','!=',0)->get();
        $list_page = Post::where([['status','!=',0],['posttype','=','page']])->get();
        $list_supplier = Supplier::where('status','!=',0)->get();
        return view('backend.menu.index',compact('list','list_category','list_topic','list_page','list_supplier'));
    }

    // Xử lý thêm
    public function store(Request $request)
    {
        $position=$request->position;
        if($request->ThemCategory)
        {   
            if($request->nameCategory !=null)
            {
                $list_id=$request->nameCategory;
                foreach($list_id as $id)
                {
                    $category = Category::find($id);
                    $menu = new Menu();
                    $menu->name = $category->name;
                    $menu->link = $category->slug;
                    $menu->orders = 0;
                    $menu->tableid = $category->id;
                    $menu->parentid = 0;
                    $menu->type = 'category';
                    $menu->position = $position;
                    $menu->created_by = 1;
                    $menu->status = 2;
                    $menu->save();
                }
                return redirect()->route('menu.index')->with('message',['typemsg'=>'success','msg'=>'Thêm thành công']);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg'=>'danger','msg'=>'Chưa chọn danh mục sản phẩm']);

            }
        }


        if($request->ThemTopic)
        {
            if($request->nameTopic !=null)
            {
                $list_id=$request->nameTopic;
                foreach($list_id as $id)
                {
                    $topic = Topic::find($id);
                    $menu = new Menu();
                    $menu->name = $topic->name;
                    $menu->link = $topic->slug;
                    $menu->orders = 0;
                    $menu->tableid = $topic->id;
                    $menu->parentid = 0;
                    $menu->type = 'topic';
                    $menu->position = $position;
                    $menu->created_by = 1;
                    $menu->status = 2;
                    $menu->save();
                }
                return redirect()->route('menu.index')->with('message',['typemsg'=>'success','msg'=>'Thêm thành công']);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg'=>'danger','msg'=>'Chưa chọn chủ đề bài viết']);

            }
        }


        if($request->ThemPage)
        {
            if($request->namePage !=null)
            {
                $list_id=$request->namePage;
                foreach($list_id as $id)
                {
                    $post = Post::find($id);
                    $menu = new Menu();
                    $menu->name = $post->title;
                    $menu->link = $post->slug;
                    $menu->orders = 0;
                    $menu->tableid = $post->id;
                    $menu->parentid = 0;
                    $menu->type = 'page';
                    $menu->position = $position;
                    $menu->created_by = 1;
                    $menu->status = 2;
                    $menu->save();
                }
                return redirect()->route('menu.index')->with('message',['typemsg'=>'success','msg'=>'Thêm thành công']);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg'=>'danger','msg'=>'Chưa chọn trang đơn']);

            }       
        }


        if($request->ThemSupplier)
        {
            if($request->nameSupplier  !=null)
            {
                $list_id=$request->nameSupplier;
                foreach($list_id as $id)
                {
                    $supplier = Supplier::find($id);
                    $menu = new Menu();
                    $menu->name = $supplier->name;
                    $menu->link = $supplier->slug;
                    $menu->orders = 0;
                    $menu->tableid = $supplier->id;
                    $menu->parentid = 0;
                    $menu->type = 'supplier';
                    $menu->position = $position;
                    $menu->created_by = 1;
                    $menu->status = 2;
                    $menu->save();
                }
                return redirect()->route('menu.index')->with('message',['typemsg'=>'success','msg'=>'Thêm thành công']);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg'=>'danger','msg'=>'Chưa chọn nhà cung cấp']);

            }           }


        if($request->ThemCustom)
        {   
            if($request->name!=null && $request->link!=null)
            {
                $menu = new Menu();
                $menu->name = $request->name;
                $menu->link = $request->link;
                $menu->orders = 0;
                $menu->parentid = 0;
                $menu->type = 'custom';
                $menu->position = $position;
                $menu->created_by = 1;
                $menu->status = 2;
                $menu->save();
                return redirect()->route('menu.index')->with('message',['typemsg'=>'success','msg'=>'Thêm thành công']);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg'=>'danger','msg'=>'Chưa điền đầy đủ thông tin']);

            }

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu=Menu::find($id);
        return view('backend.menu.show',compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }

      /* GET:admin/menu/1/status 
    */
    public function status($id)
    {
        //
        $menu= Menu::find($id);
        if($menu==null)
        {
            return redirect()->route('menu.index')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $menu->status=($menu->status==2)?1:2;
        $menu->save();
        return redirect()->route('menu.index')->with('message',['typemsg'=>'success','msg'=>'Thay đổi trạng thái thành công']);

    }

    public function destroy($id)
    {
        $menu=Menu::find($id);
        if($menu==null)
        {
            return redirect()->route('menu-trash')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $menu->delete();
        return redirect()->route('menu-trash')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);
    }

    public function trash()
    {
        $list=Menu::where('status','==',0  )->orderBy('created_at','desc')->get();
        return view('backend.menu.trash',compact('list'));
    }

        /* GET:admin/menu/1/deltrash 
    */
    public function deltrash($id)
    {
        $menu= Menu::find($id);
        if($menu==null)
        {
            return redirect()->route('menu.index')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $menu->status=0;
        $menu->save();
        return redirect()->route('menu.index')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);
    }

    /* GET:admin/menu/1/retrash 
    */
    public function retrash($id)
    {
        $menu= Menu::find($id);
        if($menu==null)
        {
            return redirect()->route('menu-trash')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $menu->status=2;
        $menu->save();
        return redirect()->route('menu-trash')->with('message',['typemsg'=>'success','msg'=>'Khôi phục thành công']);
    }


}
