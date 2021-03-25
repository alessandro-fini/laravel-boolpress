<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            /* creazione della colonna user_id */
            $table->unsignedBigInteger('user_id')->after('id');

            /* creazione della relazione */
            $table->foreign('user_id')->references('id')->on('users');
            /* alternativa contratta */
            /* $table->foreignId('user_id')->constrained(); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            /* cancellare la relazione (argomento in riferimento al keyname) */
            $table->dropForeign('posts_user_id_foreign');
            /* alternativa */
            /* $table->dropForeign(['user_id']); */

            /* cancellare la colonna */
            $table->dropColumn('user_id');
        });
    }
}
