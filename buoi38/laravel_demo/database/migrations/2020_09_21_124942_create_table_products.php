<?php
//database/migrations/..create_table_products.php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //khai báo các trường thông qua các phương thức có sẵn
      //mà Laravel cung cấp
        Schema::create('products', function (Blueprint $table) {
            //thông thường với các tham số mà Laravel cung cấp
          //từ trước, sẽ đc mô tả thêm bởi class trước nó
          //id, title, avatar, description, status
          //created_at, updated_at
          $table->increments('id');
          $table->string('title', 100);
          $table->string('avatar', 100);
          $table->text('description');
          $table->tinyInteger('status');
          //sinh luôn 2 trường create_at và updated_at
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      //Là phương thức hành động ngược lại up(), vd: nếu
      //up là tạo bảng -> down sẽ xóa bảng, up là tạo thêm trường
      //vào bảng -> down xóa trường đó khỏi bảng
        Schema::dropIfExists('products');
    }
}
