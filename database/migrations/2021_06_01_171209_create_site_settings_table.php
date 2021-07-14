<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo',300)->nullable();
            $table->string('icon',300)->nullable();
            $table->string('email',300)->nullable();
            $table->string('contact_no',45)->nullable();
            $table->string('site_title',300)->nullable();
            $table->string('meta_description',765)->nullable();
            $table->string('meta_keyword',765)->nullable();
            $table->string('copy_right',765)->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
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
        Schema::dropIfExists('site_settings');
    }
}
