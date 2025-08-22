console.log("Users page script loaded ✅");


const searchInput = document.getElementById("user-search");
const table = document.getElementById("users-table");
const filterInput = document.getElementById("role-filter");

if (searchInput && table) {
    console.log("search input found ✅");
    const rows = table.getElementsByTagName("tr");

    searchInput.addEventListener("input", () => {
        const term = searchInput.value.toLowerCase();

        for (let i = 1; i < rows.length; i++) {
            const row = rows[i];
            const text = row.innerText.toLowerCase();
            row.style.display = text.includes(term) ? "" : "none";
        }
    });
}

if (filterInput && table) {
    console.log("Filter input found ✅");

    const rows = table.getElementsByTagName("tr");

    filterInput.addEventListener("change", () => {
        const option = filterInput.value.toLowerCase();

        for (let i = 1; i < rows.length; i++) {
            const row = rows[i];
            const roleCell = row.cells[3];
            if (!roleCell) continue;

            const roleText = roleCell.innerText.toLowerCase();
            console.log(option);
            // if "یک گزینه را انتخاب کنید" (empty value) → reset filter
            if (option === "") {
                row.style.display = "";
            }
            else if (option === "admin")
            {
                row.style.display = roleText.includes('ادمین') ? "" : "none";
            }
            else {
                row.style.display = roleText.includes(option) ? "" : "none";
            }
        }
    });
}
