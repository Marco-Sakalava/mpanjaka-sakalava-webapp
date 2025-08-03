public function up(): void
{
    Schema::table('posts', function (Blueprint $table) {
        // On ajoute la colonne 'status' après la colonne 'slug'.
        // Par défaut, tout nouvel article sera 'public'.
        $table->string('status')->after('slug')->default('public');
    });
}

public function down(): void
{
    Schema::table('posts', function (Blueprint $table) {
        // Logique pour annuler la migration.
        $table->dropColumn('status');
    });
}
