<?php

use App\Enums\JobTypesEnum;
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
        Schema::create('job_posting', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key with cascade delete
            $table->string('title')->nullable(); // Title as a string, nullable
            $table->text('description')->nullable(); // Description as text, nullable
            $table->text('requirements')->nullable(); // Requirements as text, nullable
            $table->string('salary_range')->nullable(); // Salary range as string, nullable
            $table->string('location')->nullable(); // Job location as string, nullable
            $table->enum('job_type', [JobTypesEnum::FULL_TIME->value, JobTypesEnum::PART_TIME->value, JobTypesEnum::CONTRACT->value, JobTypesEnum::REMOTE->value])->default(JobTypesEnum::FULL_TIME->value); // Job type with enum values
            $table->enum('status', ['open', 'closed'])->default('open'); // Job status with enum values
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posting');
    }
};
