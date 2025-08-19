console.log("Users page script loaded ✅");


const searchInput = document.getElementById("user-search");
const table = document.getElementById("users-table");

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
