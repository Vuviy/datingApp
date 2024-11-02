<?php

use App\Models\User;
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
        Schema::create('fast_date_infos', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table-> tinyInteger('age')->nullable()->unsigned();
            $table-> tinyInteger('gender')->nullable()->unsigned();
            $table-> tinyInteger('height')->nullable()->unsigned();
            $table-> tinyInteger('weight')->nullable()->unsigned();
            $table-> tinyInteger('hair_color')->nullable()->unsigned();
            $table-> tinyInteger('boobs_size')->nullable()->unsigned();
            $table-> tinyInteger('ass_girth')->nullable()->unsigned();
            $table-> tinyInteger('waistline')->nullable()->unsigned();
            $table-> tinyInteger('dick_length')->nullable()->unsigned();
            $table-> tinyInteger('goal_here')->nullable()->unsigned();

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
        Schema::dropIfExists('fast_date_infos');
    }
};
