<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Topic;

class PostController extends Controller
{
    
    /* GET:admin/product 
    */
    public function index()
    {
        $list=Post::where([['posts.status','!=',0],['posts.posttype','=','post']])
        ->join('topics', 'topics.id','=','posts.topid')
        ->orderBy('posts.created_at','desc')
        ->select("posts.id","posts.img","posts.title","posts.created_at","posts.status","topics.name as topname")
        ->get();
        return view('backend.post.index',compact('list'));
    }

    /* GET:admin/product/create
     */
    public function create()
    {
        $list_topic=Topic::where('status','!=',0)->orderBy('created_at','desc')->get();
        return view('backend.post.create',compact('list_topic') );
    }

   

    /* POST:admin/product/store
     */
    public function store(PostStoreRequest $request)
    {
        $post=new Post();
        $post->title=$request->title;
        $slug =Str::slug($request->title,'-');
        $post->slug= $slug;
        $post->metadesc=$request->metadesc;
        $post->metakey=$request->metakey;
        $post->detail=$request->detail;
        $post->topid=$request->topid;
        $post->status=$request->status;
        $post->posttype='post';
        $post->created_by=1;
        //upload file
        if ($request->hasFile('img')){
            $path_dir="images/posts/";
            $file= $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath=$file->move($path_dir,$fileName);
            $post->img=$fileName;
            $post->save();
            return redirect()->route('post.index')->with('message',['typemsg'=>'success','msg'=>'Thêm thành công']);
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
        return view('backend.post.show',compact('post'));

    } 

    /* GET:admin/post/1/edit 
    */
    public function edit($id)
    {
        $post=Post::find($id);
        $list_topic=Topic::where('status','!=',0)->orderBy('created_at','desc')->get();
        return view('backend.post.edit',compact('list_topic','post') );

    }

    /* PUT:admin/post 
    */
    public function update(PostUpdateRequest $request, $id)
    {
        $post=Post::find($id);
        $post->title=$request->title;
        $slug =Str::slug($request->title,'-');
        $post->slug= $slug;
        $post->metadesc=$request->metadesc;
        $post->metakey=$request->metakey;
        $post->detail=$request->detail;
        $post->topid=$request->topid;
        $post->status=$request->status;
        $post->updated_by=1;
        //upload file
        if ($request->hasFile('img')){
            $path_dir="images/posts/";
            $file= $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath=$file->move($path_dir,$fileName);
            $post->img=$fileName;
        }
        $post->save();
        return redirect()->route('post.index')->with('message',['typemsg'=>'success','msg'=>'Cập nhật thành công']);

    }

    
    /* DELETE:admin/post 
    */
    public function destroy($id)
    {
        $post=Post::find($id);
        if($post==null)
        {
            return redirect()->route('post-trash')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $post->delete();
        return redirect()->route('post-trash')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);

    }


    /* GET:admin/post-trash 
    */
    public function trash()
    {
        $list=Post::where([['posts.status','=',0],['posts.posttype','=','post']])
        ->join('topics', 'topics.id','=','posts.topid')
        ->orderBy('posts.created_at','desc')
        ->select("posts.id","posts.img","posts.title","posts.created_at","posts.status","topics.name as topname")
        ->get();
         return view('backend.post.trash',compact('list'));
    }

    
    /* GET:admin/post/1/status 
    */
    public function status($id)
    {
        //
        $post= Post::find($id);
        if($post==null)
        {
            return redirect()->route('post.index')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $post->status=($post->status==2)?1:2;
        $post->save();
        return redirect()->route('post.index')->with('message',['typemsg'=>'success','msg'=>'Thay đổi trạng thái thành công']);

    }
    /* GET:admin/post/1/deltrash 
    */
    public function deltrash($id)
    {
        $post= Post::find($id);
        if($post==null)
        {
            return redirect()->route('post.index')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $post->status=0;
        $post->save();
        return redirect()->route('post.index')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);
    }

    /* GET:admin/post/1/retrash 
    */
    public function retrash($id)
    {
        $post= Post::find($id);
        if($post==null)
        {
            return redirect()->route('post-trash')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $post->status=2;
        $post->save();
        return redirect()->route('post-trash')->with('message',['typemsg'=>'success','msg'=>'Khôi phục thành công']);
    }
}
