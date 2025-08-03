public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        // On ajoute la colonne 'role' après la colonne 'email'
        // Elle est de type string, et par défaut, tout nouvel utilisateur sera un 'membre'.
        $table->string('role')->after('email')->default('membre');
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Si on annule la migration, on supprime la colonne 'role'.
        $table->dropColumn('role');
    });
}
