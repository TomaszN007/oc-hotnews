<?php namespace Datacenterppnt\Hotnews\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateNewsTable extends Migration
{

    public function up()
    {
        Schema::create('datacenterppnt_hotnews_news', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string( 'title', 150 );
            $table->string( 'slug', 150 )->index();
            $table->text('small_content');
            $table->mediumText('full_content');
            $table->string('status', 1)->default(1);
            $table->string('image', 250)->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datacenterppnt_hotnews_news');
    }

}
