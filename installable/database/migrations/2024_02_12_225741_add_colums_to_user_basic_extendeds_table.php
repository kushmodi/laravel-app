<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected function dropColumnIfExists(Blueprint $table, $column)
    {
        if (Schema::hasColumn($table->getTable(), $column)) {
            $table->dropColumn($column);
        }
    }
    protected function addColumnIfNotExists(Blueprint $table, $column, $type, $length = null)
    {
        if (!Schema::hasColumn($table->getTable(), $column)) {
            if ($length !== null) {
                $table->{$type}($column, $length)->nullable();
            } else {
                $table->{$type}($column)->nullable();
            }
        }
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_basic_extendeds', function (Blueprint $table) {
            $this->addColumnIfNotExists($table, 'menu_section_title', 'string');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_basic_extendeds', function (Blueprint $table) {
            $this->dropColumnIfExists($table, 'menu_section_title');
        });
    }
};
