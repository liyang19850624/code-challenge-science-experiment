<?php

namespace CodeChallenge\ScienceExperiment;

use DateTime;
use Exception;

class CommonUtils
{

    /**
     * format date from string to date
     * @param string $date string date
     * @return DateTime
     * @throws Exception
     */
    public function formatDate(string $date) : DateTime
    {
        if (!$dt = DateTime::createFromFormat("d/m/Y", $date)) {
            throw new Exception("Invalid datetime format. Expected dd/mm/YYYY. Found $date");
        }
        return $dt;
    }

    /**
     * calculate date using DateTime
     * @param DateTime $dateA from date
     * @param DateTime $dateB to date
     * @return type
     * @throws Exception
     */
    public function daysInDiff(string $dateA, string $dateB) : int
    {
        if ($dateA > $dateB) {
            throw new Exception("Invalid to date $dateB");
        }
        $dateADT = $this->formatDate($dateA);
        $dateBDT = $this->formatDate($dateB);
        if ($dateADT->format("Y-m-d H:i:s") == $dateBDT->format("Y-m-d H:i:s")) {
            return 0;
        } elseif ($dateADT->format("Y-m-d H:i:s") > $dateBDT->format("Y-m-d H:i:s")) {
            return $this->calculateDaysInDiff($dateBDT, $dateADT);
        } else {
            return $this->calculateDaysInDiff($dateADT, $dateBDT);
        }
    }

    /**
     * calculate diff in days
     * @param DateTime $dateTimeA
     * @param DateTime $dateTimeB
     * @return int
     * @throws Exception
     */
    private function calculateDaysInDiff(DateTime $dateTimeA, DateTime $dateTimeB) : int
    {
        if ($dateTimeB > $dateTimeB) {
            throw new Exception("Invalid to date");
        }
        //first day on $dateA is ignored
        $dateTimeA->modify("+1 day")->modify("00:00:00");
        //last day on $dateB is ignored
        $dateTimeB->modify("23:59:59");

        return $dateTimeA->diff($dateTimeB)->days;
    }
}
