<?php
namespace App;

class Post
{
    public function getPosts($session){

        if (!$session->has('posts')){
        $this->createDummyData($session);

        }
//        var_dump($session);
//        exit();
        return $session->get('posts');
    }

    public function getPost($session,$id){

        if (!$session->has('posts')){
            $this->createDummyData();

        }
        $temp=$session->get('posts');
        return $temp[$id];
    }

    public function addPost($session,$title,$content){

        if (!$session->has('posts')){
            $this->createDummyData();

        }
        $posts=$session->get('posts');
        array_push($posts,['title'=>$title,'content'=>$content]);
        $session->put('posts',$posts);
    }

    public function editPost($session,$id,$title,$content){

        if (!$session->has('posts')){
            $this->createDummyData();

        }
        $posts=$session->get('posts');
        $posts[$id]=['title'=>$title,'content'=>$content];
        $session->put('posts',$posts);
    }


    public function setPost(){

    }
    private function createDummyData($session){





        $posts = [
            [
                'title' => 'Our first blade learning',
                'content' => 'sdfafafa '
            ],
            [
                'title' => 'Our secondchanges  blade learning',
                'content' => 'This is our first implementation of blade templating '
            ],
            [
                'title' => 'last one',
                'content' => 'last try '
            ]
        ];
        $session->put('posts',$posts);

    }



}