import axios from 'axios';

document.addEventListener("DOMContentLoaded", () => {
    const tableBody = document.querySelector("#users-table-body");
    const filterSelect = document.querySelector("#filter-select"); // your <select> for filters
    const searchInput = document.querySelector("#table-search");

    function loadUsers(filter = null, page = 1, search=null) {
        let url = `/admin/users/index?page=${page}`;
        if (filter) {
            url += `&filter=${filter}`;
        }
        if(search !== null) {
            url += `&search=${search}`;
        }

        axios.get(url)
            .then(response => {
                const users = response.data.users.data;
                renderTable(users);
            })
            .catch(error => {
                console.error(error);
            });
    }

    function renderTable(users) {
        tableBody.innerHTML = ""; // clear old rows

        users.forEach(user => {
            const row = `
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm">
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        ${user.id}
                    </th>
                    <td class="px-6 py-4">${user.name}</td>
                    <td class="px-6 py-4">
                        ${user.roles.length > 0 ? user.roles[0].name : 'No Role'}
                    </td>
                    <td class="px-6 py-4">${user.email}</td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">ویرایش</a>
                    </td>
                </tr>
            `;
            tableBody.insertAdjacentHTML("beforeend", row);
        });
    }

    // Load on page ready
    loadUsers();

    // Load with Just filter
    if(filterSelect) {
        filterSelect.addEventListener("change", () => {
            loadUsers(filterSelect.value);
        });
    }

    // Load with filter and search
    if (searchInput) {
        searchInput.addEventListener("input", () => {
            const filter = filterSelect ? filterSelect.value : null;
            loadUsers(filter, 1, searchInput.value);
        });
    }
});
