<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use thiagoalessio\TesseractOCR\TesseractOCR;


class extractInfoFromPdf extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'extract:pdf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Extract info from PDF file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $fileRead = (new TesseractOCR('storage\data\bon_livraison.png'))
        ->setLanguage('fr')
        ->run();

        // $fileRead = (new TesseractOCR('storage\data\test.pdf'))
        // ->setLanguage('eng')
        // ->run();
        dump($fileRead);
        // $this->comment('Informations extraites');
    }
}
