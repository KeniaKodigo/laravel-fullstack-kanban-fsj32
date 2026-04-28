<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Tareas</title>
    <style>
        /* Tipografía y General */
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        /* Encabezado */
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            border-bottom: 5px solid #3498db;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
        }

        .meta-info {
            margin-top: 5px;
            font-size: 10px;
            color: #bdc3c7;
        }

        /* Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th {
            background-color: #f8f9fa;
            color: #2c3e50;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 11px;
            border-bottom: 2px solid #dee2e6;
            padding: 12px 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            font-size: 11px;
            vertical-align: middle;
        }

        /* Zebra Striping */
        tr:nth-child(even) {
            background-color: #fafafa;
        }

        /* Badges (Estados y Prioridad) */
        .badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 9px;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
        }

        /* Colores de Prioridad */
        .bg-alta { background-color: #e74c3c; }    /* Rojo */
        .bg-media { background-color: #f39c12; }   /* Naranja */
        .bg-baja { background-color: #27ae60; }    /* Verde */

        /* Estilo de Estado */
        .status-pendiente { color: #7f8c8d; font-style: italic; }
        .status-completada { color: #2980b9; font-weight: bold; }

        /* Pie de página */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #95a5a6;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Gestión de Tareas</h1>
        <div class="meta-info">
            Generado el: {{ date('d/m/Y H:i') }} | Usuario: {{ auth()->user()->name ?? 'Sistema' }}
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="40%">Título de la Tarea</th>
                <th width="15%">Estado</th>
                <th width="15%">Prioridad</th>
                <th width="20%">Fecha Límite</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>
                    <strong>{{ $task->title }}</strong><br>
                    <small style="color: #7f8c8d;">{{ Str::limit($task->description, 50) }}</small>
                </td>
                <td>
                    <span>
                        {{ $task->status }}
                    </span>
                </td>
                <td>
                    {{-- Badge condicional para prioridad --}}
                    @php
                        $colorClass = match(strtolower($task->priority)) {
                            'alta' => 'bg-alta',
                            'media' => 'bg-media',
                            'baja' => 'bg-baja'
                        };
                    @endphp
                    <span class="badge {{ $colorClass }}">
                        {{ $task->priority }}
                    </span>
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Página <span class="pagenum"></span> - Reporte Confidencial
    </div>

</body>
</html>