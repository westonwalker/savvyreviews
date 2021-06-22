<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('password', function ($table) {
                $table->unsignedBigInteger('plan_id')->nullable();
                $table->boolean('is_active')->default(true);
            });
            
            $table->foreign('plan_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('stripe_plan_id')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->string('google_auth')->nullable();
            $table->string('google_account_id')->nullable();
            $table->string('google_location_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->foreign('user_id')
                ->references('id')
                ->on('businesses')
                ->onDelete('cascade');
        });
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id')->nullable();
            $table->string('name')->nullable();
            $table->string('reviewer_name')->nullable();
            $table->string('comment')->nullable();
            $table->decimal('rating')->nullable();
            $table->decimal('max_rating')->nullable();
            $table->string('google_review_id')->nullable();
            $table->timestamps();
            
            $table->foreign('business_id')
                ->references('id')
                ->on('reviews')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('');
    }
}