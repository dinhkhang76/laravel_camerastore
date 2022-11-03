<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Product;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Post;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    function Getsearch(Request $request)
    {
        $product = Product::where('name', 'like', '%' . $request->key . '%')->get();
        if ($product != null) {
            return view('frontend.search', compact('product'));
        } else {
            return view('site.home');
        }
    }

    public function index($slug = null)
    {
        if($slug == null){
            return $this->home();
        }  
        else{
            //Kiểm tra trong bảng link có chứa slug
            $link = Link::where('slug', '=', $slug)->first();
            if($link != null){
                    $type = $link->type; //category, topic, supplier, page
                switch($type){
                    case 'category' : { return $this->product_category($slug); }
                    case 'supplier' : { return $this->product_supplier($slug); }
                    case 'topic' : { return $this->post_topic($slug); }
                    case 'page' : { return $this->post_page($slug); }
                    default : { return $this->error404($slug); }
                }
            }
            else{
                $product = Product::where([['slug', '=', $slug],['status', '=', '1']])->first();
                if($product != null){
                    return $this->product_detail($product);
                }
                else{
                    $post = Post::where([['slug', '=', $slug],['status', '=', '1'],['posttype','=','post']])->first();
                    if($post != null){
                        return $this->post_detail($post);
                    }
                    else{
                        return $this->error404($slug);
                    }
                }
            }
        } 
    }
    //Trang chủ
    private function home(){
        $list_category = Category::where([['status', '=', '1'], ['parentid', '=', '0']])->get();
        return view('frontend.home', compact('list_category'));//Gọi giao diện
    }
    //Sản phẩm
    public function product(){
        $list_product = Product::where('status', '=', '1')->orderBy('created_at', 'desc')->paginate(9);
        return view('frontend.product',compact('list_product'));
    }
    private function product_category($slug){
        $row_category = Category::where([['status', '=', '1'], ['slug', '=', $slug]])->first();
        $catid = $row_category->id;
        $arrcatid = array();
        array_push($arrcatid, $catid);
        $list_category2 = Category::where([['status', '=', '1'], ['parentid', '=', $catid]])->get();
        if(count($list_category2)>0){
            foreach($list_category2 as $cat2){
                array_push($arrcatid, $cat2->id);
                $list_category3 = Category::where([['status', '=', '1'], ['parentid', '=', $cat2->id]])->get();
                if(count($list_category3)>0){
                    foreach($list_category3 as $cat3){
                        array_push($arrcatid, $cat3->id);
                    }
                }
            }
        }
        $list_product = Product::whereIn('catid', $arrcatid)->where('status', '=', '1')->orderBy('created_at', 'desc')->paginate(6);//phantrang
        return view('frontend.product-category', compact('list_product', 'row_category'));//Gọi giao diện
    }
    private function product_supplier($slug){
        $row_supplier = Supplier::where([['status', '=', '1'], ['slug', '=', $slug]])->first();
        $suppid = $row_supplier->id;
        $arrsupid = array();
        array_push($arrsupid, $suppid);
        $list_product = Product::whereIn('suppid', $arrsupid)->where('status', '=', '1')->orderBy('created_at', 'desc')->paginate(4);
        return view('frontend.product-supplier', compact('list_product', 'row_supplier'));//Gọi giao diện

        return view('frontend.product-supplier');
    }
    private function product_detail($product){
        $catid = $product->catid;
        $args= [
            ['status', '=', '1'],
            ['id','!=',$product->id]
        ];
        $arrcatid = array();
        array_push($arrcatid, $catid);
        $list_category2 = Category::where([['status', '=', '1'], ['parentid', '=', $catid]])->get();
        if(count($list_category2)>0){
            foreach($list_category2 as $cat2)
            {
                array_push($arrcatid, $cat2->id);
                $list_category3 = Category::where([['status', '=', '1'], ['parentid', '=', $cat2->id]])->get();
                if(count($list_category3)>0){
                    foreach($list_category3 as $cat3)
                    {
                        array_push($arrcatid, $cat3->id);
                    }
                }
            }
        }
        $list_other = Product::whereIn('catid', $arrcatid)->where($args)->orderBy('created_at', 'desc')->take(8)->get();
        return view("frontend.product-detail",compact('product','list_other'));
    }
    //Bài viết
    public function post(){
        $list_post = Post::where([['status', '=', '1'],['posttype','=','post']])->orderBy('created_at', 'desc')->paginate(6);
        return view("frontend.post",compact('list_post'));
    }
    private function post_topic($slug){
        $row_topic = Topic::where([['status','=','1'],['slug','=',$slug]])->first();
        $list_post = Post::where([['status', '=', '1'],['posttype','=','post'],['topid','=',$row_topic->id]])->orderBy('created_at', 'desc')->paginate(6);
        return view("frontend.post-topic",compact('list_post','row_topic'));
    }
    private function post_page($slug){
        $args=[
            ['status','=','1'],
            ['posttype','=','page'],
            ['slug','=',$slug]
        ];
        $row = Post::where( $args)->first();
        return view("frontend.post-page",compact('row'));
    }
    private function post_detail($post){
        $topid = $post->topid;
        $args= [
            ['status', '=', '1'],
            ['posttype','=','post'],
            ['topid','=',$topid],
            ['id','!=',$post->id]
        ];
        $list_other =  Post::where($args)->orderBy('created_at', 'desc')->take(10)->get();
        return view("frontend.post-detail",compact('post','list_other'));
    }
    private function error404($slug){
        return view('frontend.error404');
    }
}
