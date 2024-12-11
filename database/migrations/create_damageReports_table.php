<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('damage_reports', function (Blueprint $table) {
            $table->id('report_id');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('item_id')->constrained('inventory');
            $table->text('description');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('damage_reports');
    }
}

?>