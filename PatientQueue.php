<?php
require "Patient.php";

class PatientQueue
{
    private $front;
    private $back;

    public function __construct()
    {
        $this->front = null;
        $this->back = null;
        $this->count = 0;
    }

    public function isEmpty()
    {
        return $this->front == null;
    }

    public function enqueue($name, $code)
    {
        $patient = new Patient($name, $code);
        if ($this->isEmpty()) {
            $this->front = $this->back = $patient;
        } else {
            if ($patient->code <= $this->front->code) {
                $patient->next = $this->front;
                $this->front = $patient;
            } elseif ($patient->code >= $this->back->code) {
                $this->back->next = $patient;
                $this->back = $patient;
            } else {
                $currentPatient = $this->front;
                while (!$currentPatient->next == null) {
                    if ($patient->code <= $currentPatient->next->code) {
                        $temp = $currentPatient->next;
                        $currentPatient->next = $patient;
                        $patient->next = $temp;
                    } else {
                        $currentPatient = $currentPatient->next;
                    }
                }
            }
        }
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            return null;
        }
        $current = $this->front;
        $this->front = $this->front->next;
        return $current->name;
    }

    public function __toString()
    {
        $currentPatient = $this->front;
        $patientList = "";
        if ($this->isEmpty()) {
            return $patientList . " Empty Patient List";
        } else {
            do {
                $patientList = $patientList . "Patient: " . $currentPatient->name . " , code: " . $currentPatient->code . "<br>";
                $currentPatient = $currentPatient->next;
            } while ($currentPatient != null);
            return $patientList;
        }
    }
}


