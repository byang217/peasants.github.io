submbtn = document.getElementById('submit');
submbtn.addEventListener('click', queryCheckboxes);

function queryCheckboxes() 
{
        let total = 0;
        let checkedBox = [];
        // Ensures that only checked values are printed
        for (let i = 1; i < sheetData.length + 1; i++) {
            let checkbox = document.getElementById('prgm' + i);
            if (checkbox && checkbox.checked) {
                checkedBox.push(i);
                total++;
            }
        }
        
        if (total > 5) {
            alert("You can only compare 5 programs at a time");
        }
        else {
        showData(total, checkedBox);
        }
}
function showData(total, checkedBox)
{
    table = document.getElementById('prgmTable');
    tableString = ""
    if (table.innerHTML != "")
    {
        table.innerHTML = "";
    }
    
    for (let i = 0; i < checkedBox.length; i++)
    {
        if (i == 0)
        {
            tableString += `<tr><th>${sheetData[0][1]}</th>`
        }

        addHeader = `<th>${sheetData[checkedBox[i]][1]}</th>`;
        tableString += addHeader;
        if (checkedBox.length == i)
        {
            tableString += "</tr>"
        }
    }
    
    for (let i = 2; i < sheetData[0].length; i++)
    {
        tableString += "<tr>"
        for (let ii = 0; ii < checkedBox.length; ii++)
            {
                if (ii == 0)
                {
                    tableString += `<td>${sheetData[0][i]}</td>`;
                }
                addRecord = `<td>${sheetData[checkedBox[ii]][i]}</td>`
                tableString += addRecord;
                console.log("I'm iterating for the: " + ii + "th time!");
            }
    }
    
    
    console.log(tableString);
    table.innerHTML += tableString;
}
