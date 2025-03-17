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
        Schema::create('customer_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('cus_name',100);
            $table->string('cus_add',500);
            $table->string('cus_city',500);
            $table->string('cus_postcode',500);
            $table->string('cus_country',500);
            $table->string('cus_phone',500);
            $table->string('cus_fax',500);

            $table->string('ship_name',500);
            $table->string('ship_add',500);
            $table->string('ship_city',500);
            $table->string('ship_state',500);
            $table->string('ship_postcode',500);
            $table->string('ship_country',500);
            $table->string('ship_phone',500);

            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_profiles');
    }
};
