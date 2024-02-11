<?php

// database/migrations/xxxx_xx_xx_add_click_count_to_url_shorteners_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClickCountToUrlShortenersTable extends Migration
{
    public function up()
    {
        Schema::table('url_shorteners', function (Blueprint $table) {
            $table->unsignedInteger('click_count')->default(0);
        });
    }

    public function down()
    {
        Schema::table('url_shorteners', function (Blueprint $table) {
            $table->dropColumn('click_count');
        });
    }
}

