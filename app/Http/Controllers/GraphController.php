<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Graph;


class GraphController extends Controller
{
    private $repository;

    public function __construct(Graph $graph)
    {
        return $this->repository = $graph;
    }

    public function index()
    {
        $values1 = $this->repository::select("values")
                    ->where('weeks', 'Semana 1')
                    ->orderBy("created_at")
                    ->pluck('values');

        $values2 = $this->repository::select("values")
                    ->where('weeks', 'Semana 2')
                    ->orderBy("created_at")
                    ->pluck('values');

        $labels = $this->repository::select("labels")
                    ->where('weeks', 'Semana 1')
                    ->orderBy("created_at")
                    ->pluck('labels');

        $weeks1 = $this->repository::select("weeks")
                    ->where('weeks', 'Semana 1')
                    ->groupBy("weeks")
                    ->pluck('weeks');

        $weeks2 = $this->repository::select("weeks")
                    ->where('weeks', 'Semana 2')
                    ->groupBy("weeks")
                    ->pluck('weeks');

        return view('backend.grafico.graph', compact('values1','values2','labels','weeks1','weeks2'));


    }
}
