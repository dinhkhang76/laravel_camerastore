<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Link;
use App\Models\Menu;

class PageController extends Controller
{
    public function index()
    {
        $list=Post::where([['posts.status','!=',0],['posts.posttype','=','page']])
        ->orderBy('created_at','desc')
        ->get();
        return view('backend.page.index',compact('list'));
    }

    /* GET:admin/product/create
     */
    public function create()
    {
        return view('backend.page.create');
    }

   

    /* POST:admin/product/store
     */
    public function store(PageStoreRequest $request)
    {
        $post=new Post();
        $post->title=$request->title;
        $slug =Str::slug($request->title,'-');
        $post->slug= $slug;
        $post->metadesc=$request->metadesc;
        $post->metakey=$request->metakey;
        $post->detail=$request->detail;
        $post->status=$request->status;
        $post->posttype='page';
        $post->created_by=1;
        //upload file
        if ($request->hasFile('img')){
            $path_dir="images/pages/";
            $file= $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath=$file->move($path_dir,$fileName);
            $post->img=$fileName;
            if($post->save())
            {
                $link= new Link();
                $link->slug = $slug;
                $link->tableid=$post->id;
                $link->type='page';
                $link->save();
            }
            return redirect()->route('page.index')->with('message',['typemsg'=>'success','msg'=>'Thêm thành công']);
        }
        else
        {
            return redirect()->back()->with('imgerror','Chưa chọn hình ảnh');

        }
        
    }

   
    /* GET:admin/post/1 
    */
    public function show($id)
    {
        $post=Post::find($id);
        return view('backend.page.show',compact('post'));

    } 

    /* GET:admin/post/1/edit 
    */
    public function edit($id)
    {
        
        $post=Post::find($id);
        return view('backend.page.edit',compact('post'));

    }

    /* PUT:admin/post 
    */
    public function update(PageUpdateRequest $request, $id)
    {
        $post=Post::find($id);
        $post->title=$request->title;
        $slug =Str::slug($request->title,'-');
        $post->slug= $slug;
        $post->metadesc=$request->metadesc;
        $post->metakey=$request->metakey;
        $post->detail=$request->detail;
        $post->status=$request->status;
        $post->posttype='page';
        $post->updated_by=1;
        //upload file
        if ($request->hasFile('img')){
            $path_dir="images/pages/";
            $file= $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath=$file->move($path_dir,$fileName);
            $post->img=$fileName;
        }
        if($post->save())
        {
            $link= Link::where([['tableid','=',$id],['type','=','page']])->first();
            if($link!=null)
            {
                $link->slug=$slug;
                $link->save();
            }
            $list_menu= Menu::where([['tableid','=',$id],['type','=','page']])->get();
            if(count($list_menu)>0)
            {
                foreach($list_menu as $menu)
                {
                    $menu->name=$post->title;
                    $menu->link=$slug;
                
                    $menu->save();
                }
            }
        }
        return redirect()->route('page.index')->with('message',['typemsg'=>'success','msg'=>'Cập nhật thành công']);

    }

    
    /* DELETE:admin/page 
    */
    public function destroy($id)
    {
        $post=Post::find($id);
        if($post==null)
        {
            return redirect()->route('page-trash')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $post->delete();
        return redirect()->route('page-trash')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);

    }


    /* GET:admin/post-trash 
    */
    public function trash()
    {
        $list=Post::where([['posts.status','=',0],['posts.posttype','=','page']])
        ->orderBy('created_at','desc')
        ->get();
         return view('backend.page.trash',compact('list'));
    }

    
    /* GET:admin/post/1/status 
    */
    public function status($id)
    {
        //
        $post= Post::find($id);
        if($post==null)
        {
            return redirect()->route('page.index')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $post->status=($post->status==2)?1:2;
        $post->save();
        return redirect()->route('page.index')->with('message',['typemsg'=>'success','msg'=>'Thay đổi trạng thái thành công']);

    }
    /* GET:admin/post/1/deltrash 
    */
    public function deltrash($id)
    {
        $post= Post::find($id);
        if($post==null)
        {
            return redirect()->route('page.index')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $post->status=0;
        $post->save();
        return redirect()->route('page.index')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);
    }

    /* GET:admin/post/1/retrash 
    */
    public function retrash($id)
    {
        $post= Post::find($id);
        if($post==null)
        {
            return redirect()->route('page-trash')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $post->status=2;
        $post->save();
        return redirect()->route('page-trash')->with('message',['typemsg'=>'success','msg'=>'Khôi phục thành công']);
    }
}
