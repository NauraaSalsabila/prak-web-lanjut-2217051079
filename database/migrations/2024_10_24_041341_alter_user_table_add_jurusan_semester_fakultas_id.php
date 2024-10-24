<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('npm');
    
            $table->enum('jurusan', ['fisika', 'kimia', 'biologi', 'matematika', 'ilmu komputer']);
            $table->integer('semester')->unsigned()->check(function ($query) {
                $query->whereBetween('semester', [1, 14]);
            });
            $table->unsignedBigInteger('fakultas_id');
    
            $table->foreign('fakultas_id')->references('id')->on('fakultas')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
};
