document.addEventListener('DOMContentLoaded', function() {
    const overallYearlyLimitInput = document.querySelector('input[name="overallYearlyLimit"]');
    const upToPreviousExpenseInput = document.querySelector('input[name="upToPreviousExpense"]');
    const presentExpenseInput = document.querySelector('input[name="presentExpense"]');
    const totalCumulativeExpenseInput = document.querySelector('input[name="totalCumulativeExpense"]');
    const remainingValueInput = document.querySelector('input[name="remainingValue"]');
    const form = document.getElementById('approvalForm');

    const totalCumulativeExpenses = new Set();

    overallYearlyLimitInput.addEventListener('input', function() {
        const overallYearlyLimit = parseFloat(overallYearlyLimitInput.value);
        if (overallYearlyLimit > 750000) {
            alert('Overall Yearly Limit cannot be greater than 750000');
            overallYearlyLimitInput.value = 750000;
        }
        calculateRemainingValue();
    });

    presentExpenseInput.addEventListener('input', function() {
        upToPreviousExpenseInput.value = presentExpenseInput.value;
        calculateTotalCumulativeExpense();
        calculateRemainingValue();
    });

    function calculateTotalCumulativeExpense() {
        const presentExpense = parseFloat(presentExpenseInput.value) || 0;
        const previousTotalCumulativeExpense = parseFloat(totalCumulativeExpenseInput.value) || 0;

        const totalCumulativeExpense = previousTotalCumulativeExpense + presentExpense;

        if (totalCumulativeExpenses.has(totalCumulativeExpense)) {
            alert('Total Cumulative Expense Value must be unique');
            totalCumulativeExpenseInput.value = '';
        } else {
            totalCumulativeExpenses.add(totalCumulativeExpense);
            totalCumulativeExpenseInput.value = totalCumulativeExpense;
        }
    }

    function calculateRemainingValue() {
        const overallYearlyLimit = parseFloat(overallYearlyLimitInput.value) || 0;
        const presentExpense = parseFloat(presentExpenseInput.value) || 0;

        remainingValueInput.value = overallYearlyLimit - presentExpense;
    }

    form.addEventListener('submit', function(event) {
        if (!isFormValid()) {
            event.preventDefault();
            alert('Please complete all required fields and ensure all values are correct before submitting.');
        }
    });

    function isFormValid() {
        if (overallYearlyLimitInput.value === '' ||
            upToPreviousExpenseInput.value === '' ||
            presentExpenseInput.value === '' ||
            totalCumulativeExpenseInput.value === '' ||
            remainingValueInput.value === '' ||
            parseFloat(overallYearlyLimitInput.value) > 750000 ||
            totalCumulativeExpenses.has(parseFloat(totalCumulativeExpenseInput.value))) {
            return false;
        }
        return true;
    }
});
