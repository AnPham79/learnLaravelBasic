<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddColumnAvtToStudentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('sinhviens', 'anhdaidien')) {
            Schema::table('sinhviens', function (Blueprint $table) {
                $table->string('anhdaidien')->nullable()->after('trangthai');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(!Schema::hasColumn('sinhviens', 'anhdaidien')) {
            Schema::table('sinhviens', function (Blueprint $table) {
                $table->dropColumn('anhdaidien');
            });
        }
    }
}
