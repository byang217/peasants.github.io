// submbtn = document.getElementById('submit');
// submbtn.addEventListener('click', queryCheckboxes);
/*
console.log(sheetData);
document.addEventListener('DOMContentLoaded', function() {
    function queryCheckboxes() {
        console.log("Running");
        let total = 0;
        let checkedBox = [];
        // Ensures that only checked values are printed
        for (let i = 1; i < sheetData.length + 1; i++) {
            let checkbox = document.getElementById('prgm' + i);
            if (checkbox && checkbox.checked) {
                checkedBox.push(i - 1);
                total++;
            }
        }
        
        if (total > 5) {
            alert("You can only compare 5 programs at a time");
        }
        showData(total, checkedBox);
    }

    // Call the function to test if it's running
    queryCheckboxes();
}); 
function showData(total, checkedBox)
{
    console.log(checkedBox[1]);
    for (let i = 1; i < checkedBox.length; i++)
    {
        table = document.getElementById('prgmTable');
        addRecord = `<tr><th>${sheetData[checkedBox[i]][1]}</th></tr>`;
        table.innerHTML = addRecord;
    }
   
}
    */ 