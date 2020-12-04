<?php

namespace App\Exports;

//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray; 

class DataExcelExport implements FromArray
{
    protected $datos; 
	public function __construct(array $inDatos) { 
		$this->datos = $inDatos; 
	} 
	public function array(): array 
	{ 
		return $this->datos; 
	} 

}
