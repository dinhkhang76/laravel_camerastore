<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Link;
use App\Models\Menu;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use Illuminate\Support\Str;


class TopicController extends Controller
{
    /* GET:admin/topic 
    */
    public function index()
    {
        $list=Topic::where('status','!=',0  )->orderBy('created_at','desc')->get();
        return view('backend.topic.index',compact('list'));
    }

    /* GET:admin/topic/create
     */
    public function create()
    {
        $list_topic=Topic::where('status','!=',0)->orderBy('created_at','desc')->get();
        return view('backend.topic.create',compact('list_topic') );
    }

   

    /* POST:admin/topic/store
     */
    public function store(StoretopicRequest $request)
    {
        $topic=new Topic();
        $topic->name=$request->name;
        $slug =Str::slug($request->name,'-');
        $topic->slug= $slug;
        $topic->metadesc=$request->metadesc;
        $topic->metakey=$request->metakey;
        $topic->parentid=$request->parentid;
        $topic->orders=$request->orders;
        $topic->status=$request->status;
        $topic->created_by=1;
        if ($topic->save())
        { 
            $link= new Link();
            $link->slug = $slug;
            $link->tableid=$topic->id;
            $link->type='topic';
            $link->save();
        }
        return redirect()->route('topic.index')->with('message',['typemsg'=>'success','msg'=>'Thêm thành công']);
    }

   
    /* GET:admin/topic/1 
    */
    public function show($id)
    {
        $topic=Topic::find($id);
        return view('backend.topic.show',compact('topic'));

    } 

    /* GET:admin/topic/1/edit 
    */
    public function edit($id)
    {
        $topic=Topic::find($id);
        $list_topic=Topic::where('status','!=',0)->orderBy('created_at','desc')->get();
        return view('backend.topic.edit',compact('list_topic','topic'));
    }

    /* PUT:admin/topic 
    */
    public function update(UpdateTopicRequest $request, $id)
    {
        $topic=Topic::find($id);
        $topic->name=$request->name;
        $slug=Str::slug($request->name,'-');
        $topic->slug= $slug;
        $topic->metadesc=$request->metadesc;
        $topic->metakey=$request->metakey;
        $topic->parentid=$request->parentid;
        $topic->orders=$request->orders;
        $topic->status=$request->status;
        if($topic->save())
        {
            $link= Link::where([['tableid','=',$id],['type','=','topic']])->first();
            if($link!=null)
            {
                $link->slug=$slug;
                $link->save();
            }
            $list_menu= Menu::where([['tableid','=',$id],['type','=','topic']])->get();
            if(count($list_menu)>0)
            {
                foreach($list_menu as $menu)
                {
                    $menu->name=$topic->name;
                    $menu->link=$slug;
                    $menu->save();
                }
            }
            
        }
        return redirect()->route('topic.index')->with('message',['typemsg'=>'success','msg'=>'Cập nhật thành công']);
    }

    
    /* DELETE:admin/topic 
    */
    public function destroy($id)
    {
        $topic=Topic::find($id);
        if($topic==null)
        {
            return redirect()->route('topic-trash')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $topic->delete();
        return redirect()->route('topic-trash')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);

    }


    /* GET:admin/topic-trash 
    */
    public function trash()
    {
        $list=Topic::where('status','==',0  )->orderBy('created_at','desc')->get();
        return view('backend.topic.trash',compact('list'));
    }

    
    /* GET:admin/topic/1/status 
    */
    public function status($id)
    {
        //
        $topic= Topic::find($id);
        if($topic==null)
        {
            return redirect()->route('topic.index')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $topic->status=($topic->status==2)?1:2;
        $topic->save();
        return redirect()->route('topic.index')->with('message',['typemsg'=>'success','msg'=>'Thay đổi trạng thái thành công']);

    }
    /* GET:admin/topic/1/deltrash 
    */
    public function deltrash($id)
    {
        $topic= Topic::find($id);
        if($topic==null)
        {
            return redirect()->route('topic.index')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $topic->status=0;
        $topic->save();
        return redirect()->route('topic.index')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);
    }

    /* GET:admin/topic/1/retrash 
    */
    public function retrash($id)
    {
        $topic= Topic::find($id);
        if($topic==null)
        {
            return redirect()->route('topic-trash')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $topic->status=2;
        $topic->save();
        return redirect()->route('topic-trash')->with('message',['typemsg'=>'success','msg'=>'Khôi phục thành công']);
    }
}
