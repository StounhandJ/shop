<?php

namespace App\Console\Commands;

use App\Exceptions\InvalidSiteException;
use App\Models\Product;
use App\Services\SantehnikParser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Command\Command as CommandAlias;

class ParseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:sant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Парсинг сайта santehnika-online.ru';

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
        try {
            $this->parse();
        } catch (InvalidSiteException $e) {
            $this->error($e->getMessage());
        }
        $this->info("Удаление лишних изображений");
        Artisan::call('img:clear');
        return CommandAlias::SUCCESS;
    }

    /**
     * @throws InvalidSiteException
     */
    public function parse()
    {
        $statistics = [];
        foreach (config("parser.santehnik") as $url_parse) {
            $this->info("Парсинга: " . $url_parse);
            $parser = new SantehnikParser($url_parse);
            $this->info("Товаров: " . $parser->count());
            $progressBar = $this->output->createProgressBar();
            $progressBar->setFormat('verbose');
            $progressBar->start();
            /** @var $product Product */
            foreach ($progressBar->iterate($parser->parseGenerator(), $parser->count()) as $product) {
                $search_product = Product::getByTitle($product->getTitle());
                if ($search_product->exists) {
                    $search_product->setDescriptionIfNotEmpty($product->getDescription());
                    $search_product->setImgSrcIfNotEmpty($product->getImgPath());
                    $search_product->setCategoryIfNotEmpty($product->getCategory());
                    $search_product->setMakerIfNotEmpty($product->getMaker());
                    $search_product->setPriceIfNotEmpty($product->getPrice());
                    $search_product->save();
                } else {
                    $product->save();
                }
            }
            $parser_stat = $parser->statistics();
            $statistics[] = [
                $url_parse,
                $parser->count(),
                $parser_stat["countCategories"],
                $parser_stat["countMakers"]
            ];
            $progressBar->finish();
            $this->newLine();
        }
        $this->table(["Ссылка", "Создано/Изменено товаров", "Категорий", "Производителей"], $statistics);
    }
}
