<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\category as model;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $data = array(
            array('name'=>'suggestions', 'created_at'=>now()),
            array('name'=>'appetizers', 'created_at'=>now()),
            array('name'=>'main dishes', 'created_at'=>now()),
            array('name'=>'for the kids', 'created_at'=>now()),
            array('name'=>'desserts', 'created_at'=>now())
        );

        model::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_User_Default_Member_Role`');
        Schema::dropIfExists('categories');
    }
}
