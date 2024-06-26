<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Internal Approval Form</title>
  <link rel="stylesheet" href="styles.css">
  <script src="script.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
  <link rel="stylesheet" href="a.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
  <script src="a.js" defer></script>

</head>
<body>
  <div class="container">
    <div class="header">
      <img src="logo.jpg" alt="Logo" class="logo">
      <div class="title">Internal Approval</div>
    </div>

    <form id="approvalForm" action="process_form.php" method="post">
      <table class="approval-table">
        <tr>
          <td><b>NOTE FOR APPROVAL</b></td>
          <td colspan="1">
            <input type="text" name="approvalNote" placeholder="" maxlength="255">
          </td>
          <td><b>Approval Note No.</b></td>
          <td><input type="text" name="approvalNoteNo" placeholder="" maxlength="255"></td>
        </tr>
        <tr>
          <td><b>Date</b></td>
          <td><input type="date" name="date" placeholder="" maxlength="255" ></td>
          <td><b>Expense Type</b></td>
          <td><input type="text" name="expenseType" placeholder="" maxlength="255"></td>
        </tr>
        <tr>
          <td><b>Department</b></td>
          <td>
            <select id="departmentSelect" name="department">
              <option value="" disabled>Select Department</option>
              <option value="DCS">DCS</option>
              <option value="Civil- Buildings">Civil- Buildings</option>
              <option value="Civil-Tunl & Infra">Civil-Tunl & Infra</option>
              <option value="Utility Tunnel MEP">Utility Tunnel MEP</option>
              <option value="Civil- Transports">Civil- Transports</option>
              <option value="Water">Water</option>
              <option value="AWCS">AWCS</option>
              <option value="STP">STP</option>
              <option value="ICT">ICT</option>
              <option value="TMS">TMS</option>
              <option value="Plan, Archi. & EHS">Plan, Archi. & EHS</option>
              <option value="Landscape & Horti.">Landscape & Horti.</option>
              <option value="B.D.">B.D.</option>
              <option value="Legal">Legal</option>
              <option value="HR">HR</option>
              <option value="Finance">Finance</option>
              <option value="IFSC">IFSC</option>
              <option value="Environment & Sus">Environment & Sus</option>
              <option value="SEZ (Spl Econ Zon)">SEZ (Spl Econ Zon)</option>
              <option value="Corporate Comm.">Corporate Comm.</option>
            </select>
          </td>
          <td><b>Financial Year</b></td>
          <td><input type="text" name="financialYear" placeholder="" maxlength="255"></td>
        </tr>
      </table>

      <div class="work-details">
        <h3>Work Details</h3>
        <table class="details-table">
          <tr>
            <td>Subject of Work</td>
            <td><input type="text" name="subjectOfWork" placeholder="" maxlength="255"></td>
            <td>If No, Mode of recovery from original contract</td>
            <td>
              <select name="defectLiabilityCompleted">
                <option value="Yes">Applicable</option>
                <option value="No">Not Applicable</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Scope/Description of Work</td>
            <td><input type="text" name="Scope" placeholder="" maxlength="1000"></td>
            <td>Location of Work</td>
            <td><input type="text" name="locationOfWork" placeholder="" maxlength="255"></td>
          </tr>
          <tr>
            <td>BOQ with Rate Reference</td>
            <td><input type="text" name="boqReference" placeholder="" maxlength="255"></td>
            <td>Technical Justification</td>
            <td><input type="text" name="technicalJustification" placeholder="" maxlength="255"></td>
          </tr>
          <tr class="defect-liability-details" style="display: none;">
            <td>If No, Mode of recovery from original contract</td>
            <td colspan="4"><input type="text" name="defectRecoveryMode" maxlength="255"></td>
          </tr>
          <tr>
            <td>Reason for Urgency</td>
            <td><input type="text" name="reasonForUrgency" placeholder="" maxlength="255"></td>
            <td>Whether Defect Liability Period Completed (if applicable)</td>
            <td>
              <select name="defectLiabilityCompleted">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Name of Agency</td>
            <td><input type="text" name="agencyName" placeholder="" maxlength="255"></td>
            <td>Qualification of Agency</td>
            <td><input type="text" name="agencyQualification" placeholder="" maxlength="255"></td>
          </tr>
          <tr>
            <td>Duration of Work</td>
            <td><input type="text" name="workDuration" placeholder="" maxlength="255"></td>
            <td>WBS Element</td>
            <td><input type="text" name="wbsElement" placeholder="" maxlength="255"></td>
          </tr>
        </table>
      </div>

      <div class="summary">
        <h3>Summary</h3>
        <table class="summary-table">
          <tr>
            <td>Overall Yearly Limit (Amount in Rs.)</td>
            <th><input type="text" id="overallYearlyLimit" name="overallYearlyLimit" value="0" readonly></th>
            <td>Up to Previous expense value (Amount in Rs.)</td>
            <th><input type="text" id="upToPreviousExpense" name="upToPreviousExpense" value="0" readonly></th>
          </tr>
          <tr>
            <td>Present Expense Value (Amount in Rs.)</td>
            <td><input type="text" id="presentExpense" name="presentExpense" value="0" ></td>
            <td>Total Cumulative Expense Value (Amount in Rs.)</td>
            <td><input type="text" id="totalCumulativeExpense" name="totalCumulativeExpense" value="0" readonly></td>
          </tr>
          <tr>
            <td>Remaining Value (Amount in Rs.)</td>
            <td><input type="text" id="remainingValue" name="remainingValue" value="0" readonly></td>
          </tr>
        </table>
      </div>

      <div>
        <table>
          <tr>
            <td>Approving Authority</td>
            <td><input type="text" name=" " class="signature-box" placeholder=""></td>
            <td>Signature</td>
            <td><input type="text" name="signature" class="signature-box" placeholder=""></td>
          </tr>
        </table>
      </div>

      <table>
        <tr>
          <td>Work Status</td>
          <td>
            <select name="workStatus">
              <option value="Completed">Completed</option>
              <option value="Not Completed">Not Completed</option>
              <option value="In Progress">In Progress</option>
            </select>
          </td>
        </tr>
      </table>

      <p>Placed for payment,</p>  
      <div class="signatures">
        <div class="left-column">
          <div class="signature-box gm-ict">
            <span></span>
            <div></div>
          </div>
          <b>GM-ICT</b>
          
          <div class="signature-box vp-fa1">
            <span></span>
            <div></div>
          </div>
          <b>VP – F&A</b>
        </div>

        <div class="right-column">
          <div class="signature-box vp-fa">
            <span></span>
          </div>
          <b>Sr. VP – ICT</b>

          <div class="signature-box sr-vp-fa">
            <span></span>
          </div>
          <b>Sr. VP – F&A</b>
        </div>
      </div>
      

      <button type="button" id="saveDraftBtn">Save Draft</button>

      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="submit.html"></a>
    </form>
  </div>

  <script>

    document.getElementById('departmentSelect').addEventListener('change', function() {
      const departmentLimits = {
        "DCS": 100000,
        "Civil- Buildings": 150000,
        "Civil-Tunl & Infra": 120000,
        "Utility Tunnel MEP": 110000,
        "Civil- Transports": 130000,
        "Water": 140000,
        "AWCS": 125000,
        "STP": 135000,
        "ICT": 750000,
        "TMS": 160000,
        "Plan, Archi. & EHS": 155000,
        "Landscape & Horti.": 145000,
        "B.D.": 140000,
        "Legal": 150000,
        "HR": 130000,
        "Finance": 120000,
        "IFSC": 160000,
        "Environment & Sus": 145000,
        "SEZ (Spl Econ Zon)": 135000,
        "Corporate Comm.": 125000
      };

      const selectedDepartment = this.value;
      const limit = departmentLimits[selectedDepartment] || 0;
      document.getElementById('overallYearlyLimit').value = limit;
      updateRemainingValue();
    });

    document.getElementById('presentExpense').addEventListener('input', updateRemainingValue);

    function updateRemainingValue() {
      const overallLimit = parseFloat(document.getElementById('overallYearlyLimit').value) || 0;
      const previousExpense = parseFloat(document.getElementById('upToPreviousExpense').value) || 0;
      const presentExpense = parseFloat(document.getElementById('presentExpense').value) || 0;
      const totalCumulativeExpense = previousExpense + presentExpense;

      document.getElementById('totalCumulativeExpense').value = totalCumulativeExpense;
      document.getElementById('remainingValue').value = overallLimit - totalCumulativeExpense;
    }

    document.getElementById('approvalForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent the default form submission behavior

      // Check if all required fields are filled
      let isValid = true;
      const requiredFields = ['approvalNote','approvalNoteNo', 'date', 'expenseType', 'department', 'financialYear','subjectOfWork','defectLiabilityCompleted','Scope','locationOfWork','boqReference','technicalJustification','reasonForUrgency','agencyName','agencyQualification','workDuration','wbsElement']; 
      requiredFields.forEach(field => {
        if (!document.querySelector(`input[name="${field}"], select[name="${field}"]`).value.trim()) {
          isValid = false;
        }
      });

      if (isValid) {
        // Redirect to the "Thank You" page
        window.location.href = "thankyou.html";
      } else {
        alert('Please fill in all required fields.');
      }
    });
 
    
  </script>
</body>
</html>
