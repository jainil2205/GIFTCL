CREATE DATABASE internal_approval;

USE internal_approval;

CREATE TABLE approval_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    approvalNote VARCHAR(255),
    approvalNoteNo VARCHAR(255) unique,
    date VARCHAR(255),
    expenseType VARCHAR(255),
    department VARCHAR(255),
    financialYear VARCHAR(255),
    subjectOfWork VARCHAR(255),
    Scope TEXT,
    locationOfWork VARCHAR(255),
    boqReference VARCHAR(255),
    technicalJustification VARCHAR(255),
    defectRecoveryMode VARCHAR(255),
    reasonForUrgency VARCHAR(255),
    defectLiabilityCompleted VARCHAR(255),
    agencyName VARCHAR(255),
    agencyQualification VARCHAR(255),
    workDuration VARCHAR(255),
    wbsElement VARCHAR(255),
    overallYearlyLimit FLOAT,
    upToPreviousExpense FLOAT,
    presentExpense FLOAT,
    totalCumulativeExpense FLOAT,
    remainingValue FLOAT,
    approvingAuthority VARCHAR(255),
    signature VARCHAR(255),
    workStatus VARCHAR(255)
);
