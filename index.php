<?php
require_once 'PatientQueue.php';

echo "<pre>";
$patientQueue = new PatientQueue();
$patientQueue->enqueue("Smith", 5);
$patientQueue->enqueue("Jones", 4);
$patientQueue->enqueue("Fehrenbach", 6);
$patientQueue->enqueue("Brown", 1);
$patientQueue->enqueue("Ingram", 1);
echo $patientQueue;
echo "<hr>";
echo $patientQueue->dequeue();
echo "<hr>";
echo $patientQueue;
echo "<hr>";
echo $patientQueue->dequeue();
echo "<hr>";
echo $patientQueue;
