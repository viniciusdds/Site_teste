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
        // $values = $this->repository::select("values")
        //             ->where('weeks', 'Semana 1')
        //             ->orderBy("created_at")
        //             ->pluck('values');

        // $labels = $this->repository::select("labels")
        //             ->where('weeks', 'Semana 1')
        //             ->orderBy("created_at")
        //             ->pluck('labels');

        // $weeks = $this->repository::select("weeks")
        //             ->where('weeks', 'Semana 1')
        //             ->groupBy("weeks")
        //             ->pluck('weeks');

        // return view('backend.grafico.graph', compact('values','labels','weeks'));

        $dia1 = $this->repository::where ( 'labels', 'Seg' )->orWhere('weeks', 'semana 1')->get();
        $dia2 = $this->repository::where ( 'labels', 'Ter' )->orWhere('weeks', 'semana 1')->get();
        $dia3 = $this->repository::where ( 'labels', 'Qua' )->orWhere('weeks', 'semana 1')->get();
        $dia4 = $this->repository::where ( 'labels', 'Qui' )->orWhere('weeks', 'semana 1')->get();
        $dia5 = $this->repository::where ( 'labels', 'Sex' )->orWhere('weeks', 'semana 1')->get();
        $dia6 = $this->repository::where ( 'labels', 'Sab' )->orWhere('weeks', 'semana 1')->get();
        $dia7 = $this->repository::where ( 'labels', 'Dom' )->orWhere('weeks', 'semana 1')->get();

        $semanas =  $this->repository::select('weeks')->groupBy('weeks')->get();


        //dd($dia1);

        foreach($semanas as $semana )
        array_push( $semanasArray, $semana->weeks );

        foreach( $dia1 as $day1 )
            array_push( $seg,  $day1->labels );
        foreach( $dia2 as $day2 )
            array_push( $ter,  $day2->labels );
        foreach( $dia3 as $day3 )
            array_push( $qua,  $day3->labels );
        foreach( $dia4 as $day4 )
            array_push( $qui,  $day4->labels );
        foreach( $dia5 as $day5 )
            array_push( $sex,  $day5->labels );
        foreach( $dia6 as $day6 )
            array_push( $sab,  $day6->labels );
        foreach( $dia7 as $day7 )
            array_push( $dom,  $day7->labels );

        array_push( $dataArray, $seg, $ter, $qua,
            $qui, $sex, $sab, $dom);

        for($i = 0; $i < count( $dataArray ); $i ++)
            $chartArray ["series"] [] = array(
                    "name" => $semanasArray [$i],
                    "data" => $dataArray [$i]
        );

        $chartArray ["chart"] = array(
            "type" => "line"
        );
        $chartArray ["title"] = array(
                "text" => "Yearly sales"
        );
        $chartArray ["credits"] = array(
                "enabled" => false
        );
        $chartArray ["xAxis"] = array(
                "categories" => array()
        );
        $chartArray ["tooltip"] = array(
                "valueSuffix" => "$"
        );
        $chartArray ["xAxis"] = array(
                "categories" => $dataArray
        );
        $chartArray ["yAxis"] = array(
                "title" => array(
                "text" => "Sales ( $ )"
                )
        );

        return view('backend.grafico.graph')->withChartarray($chartArray);
    }
}
