function reinitializeCounter() {
    const table = document.querySelector('table tbody');
    const rows = Array.from(table.querySelectorAll('tr'));

    rows.forEach((row, index) => {
        // Assuming the first column is the numbering column
        row.querySelector('td:first-child').innerText = index + 1;
    });
}

function sortTableByHighestValue(parameter) {
    const table = document.querySelector('table tbody');
    const rows = Array.from(table.querySelectorAll('tr'));

    rows.sort((a, b) => {
        const aValue = parseFloat(a.querySelector(`td:nth-child(${parameter})`).innerText) || 0;
        const bValue = parseFloat(b.querySelector(`td:nth-child(${parameter})`).innerText) || 0;
        return bValue - aValue;
    });

    // Reattach the sorted rows to the table
    rows.forEach(row => table.appendChild(row));

    // Reinitialize the row numbers
    reinitializeCounter();
}

// Call the function after the table is generated and sorted
document.addEventListener('DOMContentLoaded', () => {
    const parameterColumnIndex = 5; // Assuming the parameter column is the 5th column in the table
    sortTableByHighestValue(parameterColumnIndex);
});
