<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Sitemap::create()
            ->add($this->products())
            ->writeToFile(public_path('sitemap_products.xml'));

        Sitemap::create()
            ->add($this->categories())
            ->writeToFile(public_path('sitemap_categories.xml'));

        Sitemap::create()
            ->add('sitemap_products.xml')
            ->add('sitemap_categories.xml')
            ->writeToFile(public_path('sitemap.xml'));

        return 0;
    }

    public function products()
    {
        $count = Product::query()->count() / 5000;
        for ($i = 0; $i < $count; $i++) {
            Sitemap::create()
                ->add(Product::query()->offset($i * 5000)->limit(5000)->get()->lazy())
                ->writeToFile(public_path(sprintf('sitemaps/sitemap_product_%s.xml', $i)));
            yield sprintf('sitemaps/sitemap_product_%s.xml', $i);
        }
    }

    public function categories()
    {
        $count = Category::query()->count() / 5000;
        for ($i = 0; $i < $count; $i++) {
            Sitemap::create()
                ->add(Category::query()->offset($i * 500)->limit(500)->get()->lazy())
                ->writeToFile(public_path(sprintf('sitemaps/sitemap_category_%s.xml', $i)));
            yield sprintf('sitemaps/sitemap_category_%s.xml', $i);
        }
    }
}
