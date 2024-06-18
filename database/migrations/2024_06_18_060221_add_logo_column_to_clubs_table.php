<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogoColumnToClubsTable extends Migration
{
    public function up()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->string('logo')->nullable()->after('pelatih');
        });
    }

    public function down()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->dropColumn('logo');
        });
    }
}
