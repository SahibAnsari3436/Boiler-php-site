
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.itemCheckbox');
    const requestBtn = document.getElementById('requestInfoBtn');
    const compareBtn = document.getElementById('compareBtn'); // new button
    const maxSelection = 5;

    // Limit to max 5 items
    checkboxes.forEach(chk => {
        chk.addEventListener('change', function() {
            let checked = document.querySelectorAll('.itemCheckbox:checked');
            if (checked.length > maxSelection) {
                chk.checked = false; // undo the selection
                alert(`You can only check up to ${maxSelection} items. Uncheck one to select another.`);
            }
        });
    });

    // Request Info button logic
    requestBtn.addEventListener('click', function() {
        let selectedIds = [];
        let tableName = '';

        checkboxes.forEach(chk => {
            if (chk.checked) {
                if (!tableName) {
                    tableName = chk.dataset.table;
                }
                selectedIds.push(chk.value);
            }
        });

        if (selectedIds.length === 0 || selectedIds.length > maxSelection) {
            alert(`Please select between 1 and ${maxSelection} items.`);
        } else {
            let urlParam = tableName + '-' + selectedIds.join('+');
            window.location.href = "request.php?ids=" + encodeURIComponent(urlParam);
        }
    });

    // Compare Items button logic
    compareBtn.addEventListener('click', function() {
        let selectedRows = [];
        let checkedBoxes = document.querySelectorAll('.itemCheckbox:checked');

        if (checkedBoxes.length < 2) {
            alert("Please select at least two items to compare.");
            return;
        }

        checkedBoxes.forEach(chk => {
            let row = chk.closest('tr');
            let rowData = Array.from(row.cells).slice(1).map(cell => cell.innerText); // skip checkbox column
            selectedRows.push(rowData);
        });

        // Open popup compare table
        let compareWindow = window.open("", "Compare Items", "width=1000,height=600");
        let html = "<h2>Comparison</h2><table border='1' cellpadding='5'><tr>";
        
        // Create headers
        html += "<th>Field</th>";
        selectedRows.forEach((row, index) => {
            html += `<th>Item ${index + 1}</th>`;
        });
        html += "</tr>";

        let fields = ["Item #", "Year", "Horsepower", "Manufacturer", "Pressure", "Steam or Hot Water", "Burner", "Fuel(s)"];
        fields.forEach((field, fieldIndex) => {
            html += `<tr><td><b>${field}</b></td>`;
            selectedRows.forEach(row => {
                html += `<td>${row[fieldIndex]}</td>`;
            });
            html += "</tr>";
        });

        html += "</table>";
        compareWindow.document.write(html);
    });
});


   
document.getElementById('perPage').addEventListener('change', function() {
    const params = new URLSearchParams(window.location.search);
    params.set('perPage', this.value);
    params.set('page', 1); // reset to first page
    window.location.search = params.toString();
});
