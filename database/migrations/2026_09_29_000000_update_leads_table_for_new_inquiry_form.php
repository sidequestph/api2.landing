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
        // Column changes require doctrine/dbal unless native operations are enabled.
        Schema::useNativeSchemaOperationsIfPossible();

        Schema::table('leads', function (Blueprint $table) {
            $table->string('company', 100)->nullable()->after('email');
            $table->string('mobile_number', 20)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::useNativeSchemaOperationsIfPossible();

        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn('company');
            $table->string('mobile_number', 20)->nullable(false)->change();
        });
    }
};
