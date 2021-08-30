<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Services\SantehnikParser;
use Illuminate\Console\Command;

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
    public function handle(SantehnikParser $parser)
    {
        $progressBar = $this->output->createProgressBar();
        $progressBar->setFormat('verbose');
        $progressBar->start();
        /** @var $product Product */
        foreach ($progressBar->iterate($parser->parseGenerator(), $parser->count()) as $product) {
            $search_product = Product::getByTitle($product->getTitle());
            if ($search_product->exists) {
                $search_product->setDescriptionIfNotEmpty($product->getDescription());
                $search_product->setENameIfNotEmpty($product->getEName());
//                $search_product->setImgSrcIfNotEmpty($product->getImgSrc());
                $search_product->setCategoryIfNotEmpty($product->getCategory());
                $search_product->setMakerIfNotEmpty($product->getMaker());
                $search_product->setPriceIfNotEmpty($product->getPrice());
                $search_product->save();
            } else $product->save();
            sleep(1);
        }
        $progressBar->finish();
        return 0;
    }

    public function iterable()
    {
        $iterable = [1, 2, 3, 5];
        foreach ($iterable as $value) {
            yield $value;
        }
    }
}
