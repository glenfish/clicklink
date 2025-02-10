<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('admin_settings', function (Blueprint $table) {
            $table->id();
            $table->string('affiliate_url_base')->default('https://yourdomain.com/encryptfire?seller=');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_settings');
    }
}