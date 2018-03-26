<?php
namespace App\Controller;

use \Framework\BaseController;
use \App\Model\Report;


class ReportController extends BaseController {
    
    public function __construct() {
    }
    
    public function indexAction() {
        return $this->allAction();
    }
    
    public function contactsPerUserAction() {
        $report = new Report;
        $totals = $report->getTotalsContactsPerUser();
        
        $output = [];
        foreach($totals as $total)
            $output[] = ['label' => $total['username'], 'value' => $total['contacts']];
        
        return $this->json($output);
    }
    
    public function uselessDataAction() {
        $output = [
            [ 'y' => '2006', 'a' => 100, 'b' => 90 ],
            [ 'y' => '2007', 'a' => 75,  'b' => 65 ],
            [ 'y' => '2008', 'a' => 50,  'b' => 40 ],
            [ 'y' => '2009', 'a' => 75,  'b' => 65 ],
            [ 'y' => '2010', 'a' => 50,  'b' => 40 ],
            [ 'y' => '2011', 'a' => 75,  'b' => 65 ],
            [ 'y' => '2012', 'a' => 100, 'b' => 90 ]   
        ];
        return $this->json($output);
    }
    
    public function whateverAction() {
        $output = [
            [ 'year' => '2008', 'value' => 20 ],
            [ 'year' => '2009', 'value' => 10 ],
            [ 'year' => '2010', 'value' => 5 ],
            [ 'year' => '2011', 'value' => 5 ],
            [ 'year' => '2012', 'value' => 20 ]
        ];
        return $this->json($output);
    }
    
}