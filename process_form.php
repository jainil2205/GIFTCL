<?php
// Start session support
session_start();

// Include your database configuration file
require_once 'config.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = []; // To hold validation errors

    // Sanitize and validate input data
    $approvalNote = filter_input(INPUT_POST, 'approvalNote', FILTER_SANITIZE_STRING);
    $approvalNoteNo = filter_input(INPUT_POST, 'approvalNoteNo', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $expenseType = filter_input(INPUT_POST, 'expenseType', FILTER_SANITIZE_STRING);
    $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_STRING);
    $financialYear = filter_input(INPUT_POST, 'financialYear', FILTER_SANITIZE_STRING);
    $subjectOfWork = filter_input(INPUT_POST, 'subjectOfWork', FILTER_SANITIZE_STRING);
    $defectLiabilityCompleted = filter_input(INPUT_POST, 'defectLiabilityCompleted', FILTER_VALIDATE_BOOLEAN);
    $scope = filter_input(INPUT_POST, 'Scope', FILTER_SANITIZE_STRING);
    $locationOfWork = filter_input(INPUT_POST, 'locationOfWork', FILTER_SANITIZE_STRING);
    $boqReference = filter_input(INPUT_POST, 'boqReference', FILTER_SANITIZE_STRING);
    $technicalJustification = filter_input(INPUT_POST, 'technicalJustification', FILTER_SANITIZE_STRING);
    $reasonForUrgency = filter_input(INPUT_POST, 'reasonForUrgency', FILTER_SANITIZE_STRING);
    $agencyName = filter_input(INPUT_POST, 'agencyName', FILTER_SANITIZE_STRING);
    $agencyQualification = filter_input(INPUT_POST, 'agencyQualification', FILTER_SANITIZE_STRING);
    $workDuration = filter_input(INPUT_POST, 'workDuration', FILTER_SANITIZE_STRING);
    $wbsElement = filter_input(INPUT_POST, 'wbsElement', FILTER_SANITIZE_STRING);
    $overallYearlyLimit = filter_input(INPUT_POST, 'overallYearlyLimit', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $upToPreviousExpense = filter_input(INPUT_POST, 'upToPreviousExpense', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $presentExpense = filter_input(INPUT_POST, 'presentExpense', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $totalCumulativeExpense = filter_input(INPUT_POST, 'totalCumulativeExpense', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $remainingValue = filter_input(INPUT_POST, 'remainingValue', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // Insert data into the database
    $sql = "INSERT INTO `internal_approval` (approval_note, approval_note_no, date, expense_type, department, financial_year, subject_of_work, defect_liability_completed, scope, location_of_work, boq_reference, technical_justification, reason_for_urgency, agency_name, agency_qualification, work_duration, wbs_element, overall_yearly_limit, up_to_previous_expense, present_expense, total_cumulative_expense, remaining_value) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$approvalNote, $approvalNoteNo, $date, $expenseType, $department, $financialYear, $subjectOfWork, $defectLiabilityCompleted, $scope, $locationOfWork, $boqReference, $technicalJustification, $reasonForUrgency, $agencyName, $agencyQualification, $workDuration, $wbsElement, $overallYearlyLimit, $upToPreviousExpense, $presentExpense, $totalCumulativeExpense, $remainingValue]);

    header("Location: thankyou.html"); // Redirect to thank you page
} else {
    echo "Invalid request method.";
}
?>
