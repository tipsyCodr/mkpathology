<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Categories;
use App\Models\Test;
use App\Models\Package;
use Illuminate\Support\Facades\DB;

class ExportMkHealthData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:mkhealth-data {--output=mkhealth_export.json : Output JSON filename or path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export Categories, Tests, and Packages from mkhealth database to JSON format';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting export of mkhealth data...');

        // Build a category id?name map for fast lookup
        $categoryMap = Categories::all()->keyBy('id')->map(fn($c) => $c->name);

        $categories = Categories::all();

        // Export tests with category_name resolved from category_id
        $tests = Test::all()->map(function ($test) use ($categoryMap) {
            $arr = $test->toArray();
            $arr['category_name'] = isset($arr['category_id']) && $arr['category_id']
                ? ($categoryMap[$arr['category_id']] ?? null)
                : null;
            return $arr;
        });

        $packages = Package::all()->map(function ($pkg) use ($categoryMap) {
            $arr = $pkg->toArray();
            $arr['category_name'] = isset($arr['category_id']) && $arr['category_id']
                ? ($categoryMap[$arr['category_id']] ?? null)
                : null;
            return $arr;
        });

        $data = [
            'exported_at' => now()->toIso8601String(),
            'categories'  => $categories->toArray(),
            'tests'       => $tests->toArray(),
            'packages'    => $packages->toArray(),
        ];

        $jsonContent = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $outputPath = $this->option('output');

        if (!str_contains($outputPath, '/') && !str_contains($outputPath, '\\')) {
            $outputPath = base_path($outputPath);
        }

        file_put_contents($outputPath, $jsonContent);

        $this->info("Export completed successfully!");
        $this->info("Categories count: " . count($categories));
        $this->info("Tests count: " . count($tests));
        $this->info("Packages count: " . count($packages));
        $this->info("Saved to: " . $outputPath);

        return Command::SUCCESS;
    }
}
