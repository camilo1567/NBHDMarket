<?php

namespace App\Http\Controllers\Superadmin;

use App\Exports\ReportExport;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function ticketsReport()
    {
        //hacer reporte de tickers con excel

        $data = DB::select("SELECT
                                u.name AS usuario,t.descripcion,t.asunto, IF(t.file IS NULL, 'No', 'Si') AS archivo,
                                CASE
                                    WHEN t.status = 1 THEN 'Pendiente'
                                    WHEN t.status = 2 THEN 'En proceso'
                                    WHEN t.status = 3 THEN 'Cerrado'
                                    ELSE 'Abierto'
                                END AS status,
                                DATE_FORMAT(DATE_SUB(t.created_at, INTERVAL 5 HOUR), '%Y-%m-%d') AS fecha,
                                IF(t.fecha_cierre IS NULL, 'No cerrado', DATE_FORMAT(t.fecha_cierre, '%Y-%m-%d')) AS 'Fecha de cierre'
                            FROM
                                tickets t
                            INNER JOIN
                                users u ON t.user_id = u.id;
                            ");

        $headings = ['Usuario', 'Descripcion', 'Asunto', 'Archivo', 'Estado', 'Fecha', 'Fecha de cierre'];
        $title = 'Ticket Report';

        $export = new ReportExport($headings, $data, $title);

        return Excel::download($export, 'tickets.xlsx');

    }

    public function usersExport()
    {
        //hacer reporte de tickers con excel

        $data = DB::select("SELECT
                                u.name AS usuario, u.email,
                                CASE
                                    WHEN u.is_client = 1 THEN 'Cliente'
                                    WHEN u.is_store = 1 THEN 'Negocio'
                                    ELSE 'Cliente'
                                END AS status,
                                DATE_FORMAT(DATE_SUB(u.created_at, INTERVAL 5 HOUR), '%Y-%m-%d') AS fecha
                                FROM
                                users u
                                where id > 2
                            ");

        $headings = ['Nombre', 'Email', 'Rol', 'Fecha'];
        $title = 'Usuarios Report';

        $export = new ReportExport($headings, $data, $title);

        return Excel::download($export, 'tickets.xlsx');

    }
}
