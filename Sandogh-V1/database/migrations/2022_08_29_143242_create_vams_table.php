<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('mablagh_vam',20,0)->default(0);
            $table->tinyInteger('tedad_aghsat')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0 => dar hale anjam, 1 => etmam');
            $table->decimal('mablagh_ghest',20,0)->default(0);
            $table->decimal('baghimande_vam',20,0)->default(0);
            $table->decimal('baghimande_aghsat',20,0)->default(0);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salarys');
    }
};
