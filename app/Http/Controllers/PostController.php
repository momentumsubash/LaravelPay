<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Session\Store;


class PostController extends Controller
{
    //
    public function getIndex(Store $session){

       
        $post = new Post();
        $posts = $post->getPosts($session);
        return view('blog.index',['posts'=>$posts]);
    }

    public function getadminIndex(Store $session){

        $post = new Post();
        $posts = $post->getPosts($session);
        return view('admin.index',['posts'=>$posts]);
    }
    public function getPost(Store $session,$id){

        $post = new Post();
        $pst=$post->getPost($session,$id);
//        var_dump($pst);
//        exit();
        return view('blog.post',['pst'=>$pst]);
    }
    public function getAdminCreate(){
        return view('admin.create');
    }
    public function getAdminEdit(Store $session,$id){
        $post = new Post();
        $post=$post->getPost($session,$id);
        return view('admin.edit',['post'=>$post,'postId'=>$id]);
    }
    public function postAdminCreate(Store $session,Request $request){

        $this->validate($request,[
                'title' => 'required|min:5',
                'content' => 'required|min:10'
            ]
        );
        $post = new Post();
        $post->addPost($session,$request->input('title'),$request->input('content'));

        return redirect()->route('admin.index')->with('info','Our ost is Created with title'.$request->input('title'));
    }
    public function postAdminUpdate(Store $session,Request $request){
        $this->validate($request,[
                'title' => 'required|min:5',
                'content' => 'required|min:10'
            ]
        );
        $post = new Post();
        $post->editPost($session,$request->input('id'),$request->input('title'),$request->input('content'));
        $post->editPost($session,$request->input('Id'),$request->input('title'),$request->input('content'));

        return redirect()->route('admin.index')->with('info','Our post is Edited with title'.$request->input('title'));
    }


}
