let sortDirection = {};
// belum bisa
function sortTable(columnIndex, type) {
    const table = document.querySelector('table');
    const rows = Array.from(table.rows).slice(1); // Exclude the header row

    // Initialize sortDirection if not yet set
    if (sortDirection[columnIndex] === undefined) {
        sortDirection[columnIndex] = true; // Default to ascending
    } else {
        sortDirection[columnIndex] = !sortDirection[columnIndex]; // Toggle the sorting direction
    }

    rows.sort((rowA, rowB) => {
        let cellA = rowA.cells[columnIndex].textContent.trim();
        let cellB = rowB.cells[columnIndex].textContent.trim();

        if (type === 'num') {
            cellA = parseFloat(cellA) || 0;
            cellB = parseFloat(cellB) || 0;
        }

        if (sortDirection[columnIndex]) {
            return cellA > cellB ? 1 : cellA < cellB ? -1 : 0;
        } else {
            return cellA < cellB ? 1 : cellA > cellB ? -1 : 0;
        }
    });

    // Re-append the sorted rows to the table
    rows.forEach(row => table.appendChild(row));
}
