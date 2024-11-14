<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('job_listing', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('organization');
            $table->enum('job_type', ['Government', 'Private']);
            $table->string('location');
            $table->text('eligibility');
            $table->integer('vacancies');
            $table->date('application_start_date');
            $table->date('application_end_date');
            $table->enum('job_status', ['Open', 'Closed']);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('job_listing');
    }
};
