<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    //filtrar en base a estado y/o prioridad de las tareas
    public function generatePdfReport(Request $request){
        $status = $request->input('status_id'); //devolvemos lo que la persona selecciono
        $priority = $request->input('priority_id');

        $tasks = Task::query()
        //condicionamos si se obtiene un estado, se hace filtra por el estado solicitado
        ->when($status, function ($query, $status) {
            return $query->where('status', $status);
        })

        //condicionamos si se obtiene una prioridad, se hace filtra por la prioridad solicitada
        ->when($priority, function ($query, $priority) {
            return $query->where('priority', $priority);
        })
        
        //ordenamos por ascendencia por la fecha limite
        ->orderBy('due_date', 'asc')
        ->get();

        // creando un arrgelo con los datos y el titulo del reporte
        $data = [
            'tasks' => $tasks,
            'title' => 'Reporte de tareas por estado y prioridad'
        ];

        // cargamos la vista del pdf y le mando la informacion de las tareas y el titulo
        $pdf = Pdf::loadView('pdf.pdf_template', $data);

        // retornamos el pdf en el navegador
        return $pdf->stream('filtro_tareas_'. now()->format('Ymd_His') . '.pdf');

    }
}
