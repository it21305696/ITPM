<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->enum('semester', ['semester1', 'semester2']);
            $table->enum('document_type', [
                'Proposal',
                'Progress 1',
                'Progress 2',
                'Final',
                'Topic assessment form',
                'Project charter',
                'Status document 1',
                'Logbook',
                'Proposal document',
                'Status document 2',
                'Final thesis',
                'Website'
            ]);
            $table->string('group_id');
            $table->string('student1_it_no');
            $table->string('student1_grade');
            $table->string('student2_it_no');
            $table->string('student2_grade');
            $table->string('student3_it_no');
            $table->string('student3_grade');
            $table->string('student4_it_no');
            $table->string('student4_grade');
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
        Schema::dropIfExists('marks');
    }
}
