<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTable extends Migration
{
    public function up(){
        // create supplier table
        Schema::create('supplier', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supplierName',50)->unique();
            $table->string('supplierEmail',50)->unique();
            $table->string('supplierContact',50);
            $table->string('supplierPosition',5000);
            $table->timestamps();
        });
    }

    public function down() {
        // Drop supplier table
        Schema::dropIfExists('supplier');
    }
}
