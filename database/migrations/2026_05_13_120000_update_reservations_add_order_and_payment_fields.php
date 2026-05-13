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
        Schema::table('reservations', function (Blueprint $table) {
            $table->enum('type', ['table', 'plat'])->default('table')->after('id');
            $table->string('first_name')->nullable()->after('user_id');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('telephone')->nullable()->after('last_name');
            $table->string('email')->nullable()->after('telephone');
            $table->string('heure')->nullable()->after('date_reservation');
            $table->string('occasion')->nullable()->after('nombre_personnes');
            $table->foreignId('plat_id')->nullable()->constrained('plats')->nullOnDelete()->after('occasion');
            $table->integer('quantity')->nullable()->after('plat_id');
            $table->enum('order_type', ['sur_place', 'livraison'])->nullable()->after('quantity');
            $table->text('address')->nullable()->after('order_type');
            $table->decimal('total_amount', 12, 2)->default(0)->after('address');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending')->after('total_amount');
            $table->enum('payment_method', ['mobile_money', 'card'])->nullable()->after('payment_status');
            $table->enum('payment_channel', ['mtn', 'moov', 'oran'])->nullable()->after('payment_method');
            $table->enum('card_network', ['visa', 'mastercard'])->nullable()->after('payment_channel');
            $table->string('payment_reference')->nullable()->after('card_network');
            $table->timestamp('withdrawn_at')->nullable()->after('payment_reference');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['plat_id']);
            $table->dropColumn([
                'type',
                'first_name',
                'last_name',
                'telephone',
                'email',
                'heure',
                'occasion',
                'plat_id',
                'quantity',
                'order_type',
                'address',
                'total_amount',
                'payment_status',
                'payment_method',
                'payment_channel',
                'card_network',
                'payment_reference',
                'withdrawn_at',
            ]);
        });
    }
};
