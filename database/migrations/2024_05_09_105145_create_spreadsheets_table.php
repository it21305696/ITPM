<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpreadsheetsTable extends Migration
{
    public function up()
    {
        Schema::create('spreadsheets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_path');
            $table->string('document_type'); // Add document type column
            $table->string('docname'); // Add status column
            $table->enum('semester', ['semester1', 'semester2']); // Add semester column
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spreadsheets');
    }
}
