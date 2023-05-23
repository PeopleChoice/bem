<?php

use App\Models\Diplome;
use App\Models\Ecole;
use App\Models\MotifAppel;
use App\Models\ObjetAppel;
use App\Models\Programme;
use App\Models\ResolutionApporter;
use App\Models\TypeFormation;
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
        Schema::create('fiche_traitement_appel_entrants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('tel');
            $table->string('email')->nullable();
            $table->string('profil');
            $table->string('details')->nullable();
            $table->string('date_de_rappel')->nullable();
            $table->string('agent')->nullable();
        
    
                        
          
            $table->foreignIdFor(Ecole::class)->nullable()->constrained();
            $table->foreignIdFor(TypeFormation::class)->nullable()->constrained();
            $table->foreignIdFor(Diplome::class)->nullable()->constrained();
            $table->foreignIdFor(Programme::class)->nullable()->constrained();
            $table->foreignIdFor(MotifAppel::class)->constrained();
            $table->foreignIdFor(ObjetAppel::class)->constrained();
            $table->foreignIdFor(ResolutionApporter::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiche_traitement_appel_entrants');
    }
};
