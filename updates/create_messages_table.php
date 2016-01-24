<?php namespace Datacenterppnt\Hotnews\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateMessagesTable extends Migration
{

    public function up()
    {
        Schema::create('datacenterppnt_hotnews_messages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->text('message');
            $table->string('status', 1)->default(1);
            $table->string('image', 200)->nullable();
            $table->timestamp('published_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datacenterppnt_hotnews_messages');
    }

}
