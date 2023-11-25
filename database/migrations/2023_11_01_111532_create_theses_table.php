<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('theses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("nim")->unique();
            $table->foreignId("concentration_id")->constrained("concentrations")->onUpdate("cascade")->onDelete("cascade");
            $table->integer("year");
            $table->string("title");
            $table->longText("abstract");
            $table->string("file");
            $table->foreignId("mentor1")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("mentor2")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("examiner1")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("examiner2")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("examiner3")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("user_id")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theses');
    }
};
