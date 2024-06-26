document.getElementById('saveDraftBtn').addEventListener('click', function() {
    const form = document.getElementById('approvalForm');
    const formData = new FormData(form);
    const data = {};
  
    // Collect form data
    for (let [key, value] of formData.entries()) {
      data[key] = value;
    }
  
    // Convert form data to JSON
    const jsonData = JSON.stringify(data);
  
    // Create a blob from the JSON string
    const blob = new Blob([jsonData], {type: "application/json"});
  
    // Use SheetJS to create an Excel file from the JSON blob
    const wb = XLSX.utils.book_new();
    const ws = XLSX.utils.json_to_sheet([data]);
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
    const excelBuffer = XLSX.write(wb, {bookType: 'xlsx', type: 'array'});
  
    // Create a URL for the Excel file
    const url = URL.createObjectURL(new Blob([excelBuffer], {type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"}));
  
    // Trigger the download
    const link = document.createElement("a");
    link.href = url;
    link.download = "draft_approval_form.xlsx";
    document.body.appendChild(link);
    link.click();
  
    // Clean up the URL object
    setTimeout(() => URL.revokeObjectURL(url), 100);
  });
  