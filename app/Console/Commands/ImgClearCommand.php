<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImgClearCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'img:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Удаление не используемых ихображений';

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
        $this->info("Загрузка...");
        $disk = Storage::disk("prod_img");
        $files = $disk->files();
        $start_count_file = count($files);
        $delete_count_file = 0;

        $progressBar = $this->output->createProgressBar();
        $progressBar->setFormat('verbose');
        $this->info("Проверка файлов");
        foreach ($progressBar->iterate($files) as $img) {
            if (!Product::getByImgSrcBuilder($img)->exists()) {
                $disk->delete($img);
                $delete_count_file++;
            }
        }
        $this->line(1);
        $this->table(
            ["Каталог", "Осталось", "Удалено", "Всего Было Файлов"],
            [
                [
                    "prod_img",
                    $start_count_file - $delete_count_file,
                    $delete_count_file,
                    $start_count_file
                ]
            ]
        );
        return 0;
    }
}
