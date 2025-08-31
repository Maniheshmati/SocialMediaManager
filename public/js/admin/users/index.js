document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('input[name="filter-radio"]').forEach(radio => {
        radio.addEventListener("change", function () {
            let value = this.value;
            let url = new URL(window.location.href);
            url.searchParams.set("filter", value);
            window.location.href = url.toString(); // reload with ?filter=value
        });
    });
});
