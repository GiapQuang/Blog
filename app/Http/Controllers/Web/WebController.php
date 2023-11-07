<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function home(){
        $highlight = Post::where('highlight_post',1)->take(3)->get();  //lay ra 3 bai viet noi bat
        $new =  Post::all();
        return view('web.home',compact('highlight','new'));
    }
    public function post($slug){
        $post = Post::where('slug',$slug)->first(); 
        $post->update([
        'view_counts'=>$post->view_counts + 1  //sau khi moi nguoi click vao bai viet thi cap nhat luot view len 
        ]);
        $relate = Post::where('category_id',$post->category_id)->take(2)->inRandomOrder()->get();  //lay 2 bai viet tuong tu
        $highlight = Post::where('highlight_post',1)->take(3)->get();  
        // $comments = Comment::where('post_id',$post->id)->paginate(10); //neu nhieu comment thi dung cai nay
        return view('web.post',compact('post','relate','highlight'));
    }
    public function comment(Request $request,$id){
        Comment::create([
            'content'=>$request->get('content'),
            'user_id'=>Auth::id(),
            'post_id'=>$id
        ]);
        return redirect()->back();
    }
    public function category()
    {
        $posts = Post::paginate(3);
        $categories = Category::all();
        return view('web.category', compact('posts', 'categories'));
    }
    public function categorySlug($slug)
    {
        $category = Category::where('slug' , $slug)->first();
        $posts = Post::where('category_id', $category->id)->paginate(1);
        $categories = Category::all();
        return view('web.category', compact('posts', 'categories'));
    }
    public function contact(){
        return view('web.contact');
    }
    public function sendContact(Request $request){
        Contact::create($request->all());
        return redirect()->route('web.contact')->with('success','Created contact successfully');
    }
}
