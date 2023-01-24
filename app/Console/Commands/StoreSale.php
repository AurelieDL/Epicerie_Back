<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StoreSale extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:sales';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mise à jour des quantités avec les ventes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $worksheet = $this->getActiveSheet(storage_path('data/SALES.xls'));

        $highestRow = (string)$worksheet->getHighestRow(); 
        
        $productsArray = $worksheet->rangeToArray('A20:B' . $highestRow);

        foreach ($productsArray as $value) {   
            if(is_numeric($value[0])){
              $productToUpdate = Product::where('name', $value[1])->first();
              $productToUpdate->quantity -= $value[0];
              $productToUpdate->save();
            }
        }

        //exemple without ->rangeToArray itera througt $worksheet

        // foreach($worksheet->getRowIterator() as $row) {
        //     if ($counter++ < 15) continue;

        //     $cellIterator = $row->getCellIterator();
        //     $cellIterator->setIterateOnlyExistingCells(true);

        //     $cells = [];

        //     foreach($cellIterator as $cell) {
        //         $cells[] = $cell->getValue();  
        //     }

        //     // Product::create([
        //     //     'name' => $cells[1],
        //     //     'quantity' => $cells[0]
        //     // ]);

        // }

        $this->comment('Quantité du stock mise à jour');
    }

    private function getActiveSheet (string $path): Worksheet
    {
        return (new Xls)->load($path)->getActiveSheet();
    }
}
