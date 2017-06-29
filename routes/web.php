<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//
//route return tpes
//return view('blog.post');
//return "some text";
// return Response::Json(['name' => 'subash']);
//return redirect() ->route('index');
//

Route::get('/', function () {
    return view('blog.index');
})->name('blog.index');

Route::get('post/{id}',function ($id){

    if ($id==1){
        $post = [
            'title'=> 'Our first learning id first',
            'content' => 'this is the sample content for our example'
        ];
    }
        else
            {

                $post = [
                    'title'=> 'Loading some thing else title',
                    'content' => 'this is the sample for loading some thing else part content'
                ];
            }
//    return view('blog.post');
//    return $post['title'];
    return view('blog.post',['post' =>$post]);

})->name('blog.post');

Route::get('about-page',function (){
    return view('other.about');
})->name('other.about');

//admin routes
Route::group(['prefix' => 'admin'],function (){

    Route::get('',function (){
        return view('admin.index');
    })->name('admin.index');

    Route::get('create',function (){
       return view('admin.create');

//        return redirect()->route('admin.create');
    })->name('admin.create');

    Route::post('create',function (\Illuminate\Http\Request $request , \Illuminate\Validation\Factory $validator){
//    return view('admin.create');
        //return "it works !";
//using validation for post method
        $validation = $validator->make(

            $request->all(),[
                'title' => 'required|min:5',
                'content' => 'required|min:10'

            ]
        );
        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }

        return redirect()
            ->route('admin.index')
            ->with('info','post Created, Our title :'.$request->input('title'));
    })->name('admin.create');

    Route::get('edit/{id}',function ($id){

        if ($id==1){
            $post = [
                'title'=> 'Our first learning',
                'content' => 'this is the sample content for our example'
            ];
        }
        else
        {

            $post = [
                'title'=> 'Loading some thing else title',
                'content' => 'this is the sample for loading some thing else part content'
            ];
        }
        return view('admin.edit',['post' =>$post]);
    })->name('admin.edit');

    Route::post('edit',function (\Illuminate\Http\Request $request, \Illuminate\Validation\Factory $validator){
//    return view('admin.create');
        //return "it works !";
        $validation = $validator->make(

                $request->all(),[
                    'title' => 'required|min:5',
                    'content' => 'required|min:10'

                ]
            );
        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }
        return redirect()
            ->route('admin.index')
            ->with('info','post edited, new title :'.$request->input('title'));
    })->name('admin.update');
});

//
//Route::get('admin',function (){
//    return view('admin.index');
//})->name('admin.index');
//
//Route::get('admin/create',function (){
//    return view('admin.create');
//})->name('admin.create');
//
//Route::post('admin/create',function (){
////    return view('admin.create');
//    return "it works !";
//})->name('admin.create');
//
//Route::get('admin/edit/{id}',function (){
//    return view('admin.edit');
//})->name('admin.edit');
//
//Route::post('admin/edit',function (){
////    return view('admin.create');
//    return "it works !";
//})->name('admin.update');



//Route::
//Auth::routes();
//
//Route::get('/home', 'HomeController@index');
