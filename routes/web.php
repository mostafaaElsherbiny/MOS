<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');





Route::group(['middleware' => 'admin'], function () {
    Route::resource('admin/users', 'adminUsersC',['names'=>[
    'index'=>'admin.users.index',
    'create'=>'admin.users.create',
    'store'=>'admin.users.store',
    'edit'=>'admin.users.edit',
    
    
    ]
    
    
    ]);
    Route::resource('admin/posts', 'adminPostC',['names'=>[
        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit',
                
        
        ]
        
        
        ]);
    Route::resource('admin/categories', 'adminCatC',['names'=>[
        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit',
        
        
        ]
        
        
        ]);
    Route::resource('admin/media', 'adminMediaC',['names'=>[
        'index'=>'admin.media.index',
        'create'=>'admin.media.create',
        'store'=>'admin.media.store',
        'edit'=>'admin.media.edit',
        
        
        ]
        
        
        ]);
    Route::resource('admin/comments', 'postCommentsC',['names'=>[
        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit',
        'show'=>'admin.comments.show',
        
        
        ]
        
        
        ]);
    Route::resource('admin/comment/replies', 'commentsRepliesC',['names'=>[
        'index'=>'admin.comments.replies.index',
        'create'=>'admin.comments.replies.create',
        'store'=>'admin.comments.replies.store',
        'edit'=>'admin.comments.replies.edit',
        'show'=>'admin.comment.replies.show',
        
        
        ]
        
        
        ]);

});




Route::get('/post/{id}',['as'=>'homePost','uses'=>'adminPostC@post']);












Route::get('/admin', function () {


return view('admin.index');


});
Route::group(['middleware'=>'auth'], function(){

	Route::post('/comment/replies', 'CommentsRepliesC@createReply');

});