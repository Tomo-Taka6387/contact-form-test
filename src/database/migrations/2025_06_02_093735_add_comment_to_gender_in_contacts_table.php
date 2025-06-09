<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentToGenderInContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gender_in_contacts', function (Blueprint $table) {
            DB::statement("ALTER TABLE contacts MODIFY gender TINYINT COMMENT '1:男性,2:女性,3:その他'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gender_in_contacts', function (Blueprint $table) {
            DB::statement("ALTER TABLE contacts MODIFY gender TINYINT");
        });
    }
}
