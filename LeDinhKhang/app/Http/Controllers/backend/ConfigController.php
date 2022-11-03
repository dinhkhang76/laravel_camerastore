<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Http\Requests\ConfigUpdateRequest;
use Illuminate\Support\Str;

class ConfigController extends Controller
{
    /* GET:admin/config 
    */
    public function index()
    {
        $config=Config::first();
        return view('backend.config.index',compact('config'));
    }


    /* PUT:admin/config 
    */
    public function update(ConfigUpdateRequest $request, $id)
    {
        $config=config::find($id);
        $config->name=$request->name;
        $slug=Str::slug($request->name,'-');
        $config->slug= $slug;
        $config->metadesc=$request->metadesc;
        $config->metakey=$request->metakey;
        $config->parentid=$request->parentid;
        $config->orders=$request->orders;
        $config->status=$request->status;
        if($config->save())
        {
            $link= Link::where([['tableid','=',$id],['type','=','config']])->first();
            if($link!=null)
            {
                $link->slug=$slug;
                $link->save();
            }
            $list_menu= Menu::where([['tableid','=',$id],['type','=','config']])->get();
            if(count($list_menu)>0)
            {
                foreach($list_menu as $menu)
                {
                    $menu->name=$config->name;
                    $menu->link=$slug;
                    $menu->save();
                }
            }
            
        }
        return redirect()->route('config.index')->with('message',['typemsg'=>'success','msg'=>'Cập nhật thành công']);
    }

    
    
}
