<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewsCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('news_category', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('news_id');
			$table->unsignedInteger('category_id');
			
			$table->foreign('news_id')
                ->references('id')
                ->on('news')
                ->onDelete('cascade');
				
			$table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('cascade');

				
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
        //
    }
}
