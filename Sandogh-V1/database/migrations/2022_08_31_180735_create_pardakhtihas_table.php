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
        Schema::create('pardakhtihas', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tarikh');
            $table->decimal('code_peygiri',20,0);
            $table->decimal('mablagh_ghest',20,0);
            $table->decimal('shahriye',20,0);
            $table->text('image');
            $table->tinyInteger('ghabele_taiid')->default(0)->comment('1 => taiid, 0 => taiid_nashode');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('vam_id')->constrained('vams')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('pardakhtihas');
    }
};
