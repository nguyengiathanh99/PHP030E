<?php
//routes/web.php
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

//khi truy cập vào đường dẫn /,
// gọi view có tên = welcome, đường dẫn file này
//đang nằm tại: resources/views/welcome.blade.php
Route::get('/', function () {
    return view('welcome');
});

// + Route trong Laravel có rất nhiều phương thức có thể set đc:
//POST, GET, ngoài ra còn có PUT, PATCH , DELETE
// vd: với các hành động lấy dữ liệu ra -> GET
//thêm/update dữ liệu -> POST
//xóa -> DELETE
// + Trên là chuẩn của Laravel
Route::get('/test', function() {
  return  "<h1>Nội dung test</h1>";
});

// + route với tham số động
// /chi-tiet/3.html
Route::get('/chi-tiet/{id}.html', function($id) {
  return "Id = $id";
});

// + Route định nghĩa controller và action như MVC
// 2 route hiển thị và xử lý thêm mới
Route::get('/create',
    [\App\Http\Controllers\ProductController::class, 'create']);
Route::post('/store', 'ProductController@store');
//Route chi tiết
Route::get('/detail/{id}', 'ProductController@detail');
//Route update
Route::get('/edit/{id}', 'ProductController@edit');
Route::post('/update/{id}', 'ProuductController@upate');
// Route xóa
Route::delete('/delete/{id}', 'ProductController@delete');


