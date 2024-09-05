<?php

use App\Models\User;
use App\Models\Feed;
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
        Schema::create('payed_contents', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignIdFor(Feed::class)
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('payed_contents');
    }
};
